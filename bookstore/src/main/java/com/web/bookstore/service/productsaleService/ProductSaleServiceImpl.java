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
import org.springframework.stereotype.Service;

import java.util.Optional;
import java.util.UUID;

@Service

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
        ProductSale productSale = productSaleMapper.convertProductSaleCreateDtoToProductSale(createDTO, product);

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
        Optional<Warehouse> warehouseOptional = warehouseRepository.findById(updateDTO.getWarehouseId());
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
        existingProductSale = productSaleMapper.convertProductSaleUpdateDtoToProductSale(updateDTO, product);
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

                // Add condition for `title` if provided
                if (title != null && !title.isEmpty()) {
                    p = cb.and(p, cb.like(cb.lower(product.get("title")), "%" + title.toLowerCase() + "%"));
                }

                // Add condition for `categoryId` if provided
                if (categoryId != null && categoryId != 0) {
                    p = cb.and(p, cb.equal(product.get("category").get("id"), categoryId));
                }

                // Add condition for `saleStartPrice` if provided
                if (saleStartPrice != null) {
                    p = cb.and(p, cb.greaterThanOrEqualTo(root.get("price"), saleStartPrice));
                }

                // Add condition for `saleEndPrice` if provided
                if (saleEndPrice != null) {
                    p = cb.and(p, cb.lessThanOrEqualTo(root.get("price"), saleEndPrice));
                }

                // Add condition for `status` to be `true`
                p = cb.and(p, cb.isTrue(root.get("status")));

                return p;
            }
        };

        Page<ProductSale> productSales = productSaleRepository.findAll(spec, pageable);
        return productSales.map(productSaleMapper::convertProductSaleToProductSaleDto);
    }


    @Override
    public ProductSaleDTO findById(Integer id) {
        ProductSale productSale=productSaleRepository.findById(id).orElseThrow();
        return  productSaleMapper.convertProductSaleToProductSaleDto(productSale);
    }

    @Override
    public Page<ProductSaleDTO> getAllProductSaleBySuplly(Integer id,Pageable pageable) {
        Page<ProductSale> productSales = productSaleRepository.findByProduct_Supply_Id(id, pageable);
        return productSales.map(productSaleMapper::convertProductSaleToProductSaleDto);
    }

    @Override
    public void lockProductSale(Integer id) {
        ProductSale productSale=productSaleRepository.findById(id).orElseThrow();
        productSale.setStatus(false);
        productSaleRepository.save(productSale);
    }

    @Override
    public void unLockProductSale(Integer id) {
        ProductSale productSale=productSaleRepository.findById(id).orElseThrow();
        productSale.setStatus(true);
        productSaleRepository.save(productSale);
    }

    @Override
    public Page<ProductSaleDTO> getAll(Pageable pageable) {
       Page<ProductSale> productSales=productSaleRepository.findAll(pageable);
        return productSales.map(productSaleMapper::convertProductSaleToProductSaleDto);
    }

    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }

}
