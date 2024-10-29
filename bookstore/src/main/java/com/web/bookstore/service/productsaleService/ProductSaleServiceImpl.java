package com.web.bookstore.service.productsaleService;

import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleCreateDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleUpdateDTO;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.product.ProductSale;
import com.web.bookstore.entity.warehouse.Warehouse;
import com.web.bookstore.mapper.ProductSaleMapper;
import com.web.bookstore.repository.product.ProductRepository;
import com.web.bookstore.repository.product.ProductSaleRepository;
import com.web.bookstore.repository.warehouse.WarehouseRepository;
import jakarta.persistence.criteria.*;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.domain.Specification;

import java.util.Optional;

public class ProductSaleServiceImpl implements ProductSaleService{
    @Autowired
    private ProductSaleRepository productSaleRepository;

    @Autowired
    private ProductRepository productRepository;

    @Autowired
    private WarehouseRepository warehouseRepository;

    @Autowired
    private ProductSaleMapper productSaleMapper;
    @Override
    public ProductSaleDTO createProductSale(ProductSaleCreateDTO createDTO) {

        Product product=productRepository.findById(createDTO.getProductId()).orElseThrow();



        // Use mapper to convert DTO to ProductSale entity
        ProductSale productSale = productSaleMapper.convertProductSaleCreateDtoToProductSale(createDTO);
        productSale.setProduct(product);
        // Save ProductSale to the database
        ProductSale savedProductSale = productSaleRepository.save(productSale);


        // Convert saved ProductSale to DTO and return
        ProductSaleDTO productSaleDTO = productSaleMapper.convertProductSaleToProductSaleDto(savedProductSale);
        return productSaleDTO;
    }

    @Override
    public ProductSaleDTO updateProductSale(ProductSaleUpdateDTO updateDTO) {
        Optional<ProductSale> productSaleOptional = productSaleRepository.findById(updateDTO.getId());
        if (!productSaleOptional.isPresent()) {
            throw new RuntimeException("ProductSale not found");
        }

        ProductSale existingProductSale = productSaleOptional.get();

        // Get Product from Warehouse based on productId
        Optional<Warehouse> warehouseOptional = warehouseRepository.findByProductId(updateDTO.getProductId());
        if (!warehouseOptional.isPresent()) {
            throw new RuntimeException("Product not found in warehouse");
        }

        Warehouse warehouse = warehouseOptional.get();
        Product product = warehouse.getProduct();

        // Calculate quantity difference
        int quantityDifference = updateDTO.getQuantity() - existingProductSale.getQuantity();

        // If quantity increased, check if enough quantity in warehouse
        if (quantityDifference > 0) {
            if (warehouse.getQuantity() < quantityDifference) {
                throw new RuntimeException("Insufficient quantity in warehouse to update");
            }
            // Reduce warehouse quantity
            warehouse.setQuantity(warehouse.getQuantity() - quantityDifference);
        } else {
            // Increase warehouse quantity
            warehouse.setQuantity(warehouse.getQuantity() - quantityDifference); // quantityDifference is negative
        }
        warehouseRepository.save(warehouse);

        // Use mapper to update ProductSale entity
        existingProductSale = productSaleMapper.convertProductSaleUpdateDtoToProductSale(updateDTO);
        existingProductSale.setId(updateDTO.getId()); // Ensure the ID is set

        // Save updated ProductSale to the database
        ProductSale savedProductSale = productSaleRepository.save(existingProductSale);

        // Convert saved ProductSale to DTO and return
        ProductSaleDTO productSaleDTO = productSaleMapper.convertProductSaleToProductSaleDto(savedProductSale);
        return productSaleDTO;
    }

    @Override
    public Page<ProductSaleDTO> getAllProductSales(String title, Integer categoryId, Double saleStartPrice, Double saleEndPrice, Pageable pageable) {
        Specification<ProductSale> spec = new Specification<ProductSale>() {
            @Override
            public Predicate toPredicate(Root<ProductSale> root, CriteriaQuery<?> query, CriteriaBuilder cb) {
                Join<ProductSale, Product> product = root.join("product", JoinType.INNER);
                Predicate p = cb.conjunction();
                if (title != null && !title.isEmpty()) {
                    p = cb.and(p, cb.like(cb.lower(product.get("title")), "%" + title.toLowerCase() + "%"));
                }
                if (categoryId != null && categoryId != 0) {
                    p = cb.and(p, cb.equal(product.get("category").get("id"), categoryId));
                }
                if (saleStartPrice != null) {
                    p = cb.and(p, cb.greaterThanOrEqualTo(root.get("price"), saleStartPrice));
                }
                if (saleEndPrice != null) {
                    p = cb.and(p, cb.lessThanOrEqualTo(root.get("price"), saleEndPrice));
                }
                return p;
            }
        };

        Page<ProductSale> productSales = productSaleRepository.findAll(spec, pageable);
        return productSales.map(productSaleMapper::convertProductSaleToProductSaleDto);
    }

}
