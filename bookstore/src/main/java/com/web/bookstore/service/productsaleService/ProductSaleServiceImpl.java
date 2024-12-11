package com.web.bookstore.service.productsaleService;

import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleCreateDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleUpdateDTO;
import com.web.bookstore.entity.RedisConstant;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.product.ProductSale;
import com.web.bookstore.entity.warehouse.Warehouse;
import com.web.bookstore.mapper.ProductMapper;
import com.web.bookstore.mapper.ProductSaleMapper;
import com.web.bookstore.repository.product.ProductRepository;
import com.web.bookstore.repository.product.ProductSaleRepository;
import com.web.bookstore.repository.warehouse.WarehouseRepository;
import com.web.bookstore.service.product.ProductService;
import com.web.bookstore.service.redis.RedisService;
import jakarta.persistence.criteria.*;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageImpl;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.domain.Specification;
import org.springframework.stereotype.Service;

import java.util.List;
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

    @Autowired
    private ProductMapper productMapper;
    @Autowired
    private ProductService productService;
    @Override
    public ProductSaleDTO createProductSale(ProductSaleCreateDTO createDTO) {
        Product product =productMapper.conventProductDTOToProduct(productService.findById(createDTO.getProductId()));
        // Convert DTO to ProductSale entity and save
        ProductSale productSale = productSaleMapper.convertProductSaleCreateDtoToProductSale(createDTO, product);
        productSale.setId(getGenerationId());
        ProductSale savedProductSale = productSaleRepository.save(productSale);

        // Convert to DTO and cache it in Redis
        ProductSaleDTO productSaleDTO = productSaleMapper.convertProductSaleToProductSaleDto(savedProductSale);
        String productSaleKey = RedisConstant.PRODUCT_SALE + savedProductSale.getId();


        // Add to the list of all product sales in Redis

        return productSaleDTO;
    }

    @Override
    public ProductSaleDTO updateProductSale(ProductSaleUpdateDTO updateDTO) {
        ProductSale existingProductSale = productSaleRepository.findById(updateDTO.getId())
                .orElseThrow(() -> new RuntimeException("ProductSale not found"));

        Warehouse warehouse = warehouseRepository.findById(updateDTO.getWarehouseId())
                .orElseThrow(() -> new RuntimeException("Product not found in warehouse"));

        Product product = warehouse.getProduct();
        int quantityDifference = updateDTO.getQuantity() - existingProductSale.getQuantity();

        // Update warehouse quantity based on change
        if (quantityDifference > 0 && warehouse.getQuantity() < quantityDifference) {
            throw new RuntimeException("Insufficient quantity in warehouse to update");
        }
        warehouse.setQuantity(warehouse.getQuantity() - quantityDifference);
        warehouseRepository.save(warehouse);

        // Update ProductSale and cache the updated ProductSaleDTO
        existingProductSale = productSaleMapper.convertProductSaleUpdateDtoToProductSale(updateDTO, product);
        ProductSale savedProductSale = productSaleRepository.save(existingProductSale);

        ProductSaleDTO productSaleDTO = productSaleMapper.convertProductSaleToProductSaleDto(savedProductSale);


        return productSaleDTO;
    }

    @Override
    public Page<ProductSaleDTO> getAllProductSales(String title, Integer categoryId, Double saleStartPrice, Double saleEndPrice, Pageable pageable) {
        String cacheKey = RedisConstant.PRODUCT_SALE_LIST + title + categoryId + saleStartPrice + saleEndPrice + pageable.getPageNumber();


        Specification<ProductSale> spec = (root, query, cb) -> {
            Join<ProductSale, Product> product = root.join("product", JoinType.INNER);
            Predicate p = cb.conjunction();

            if (title != null && !title.isEmpty()) {
                p = cb.and(p, cb.like(cb.lower(product.get("name")), "%" + title.toLowerCase() + "%"));
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
            return cb.and(p, cb.isTrue(root.get("status")));
        };

        Page<ProductSale> productSales = productSaleRepository.findAll(spec, pageable);
        Page<ProductSaleDTO> productSaleDTOPage = productSales.map(productSaleMapper::convertProductSaleToProductSaleDto);



        return productSaleDTOPage;
    }

    @Override
    public ProductSaleDTO findById(Integer id) {


        ProductSale productSale = productSaleRepository.findById(id).orElseThrow();
        ProductSaleDTO productSaleDTO = productSaleMapper.convertProductSaleToProductSaleDto(productSale);

        return productSaleDTO;
    }

    @Override
    public Page<ProductSaleDTO> getAllProductSaleBySuplly(Integer Id, Pageable pageable) {
        String cacheKey = RedisConstant.LIST_PRODUCT_SALE_SUPPLY  + Id;


        Page<ProductSale> productSales = productSaleRepository.findByProduct_Supply_Id(Id, pageable);
        Page<ProductSaleDTO> productSaleDTOPage = productSales.map(productSaleMapper::convertProductSaleToProductSaleDto);



        return productSaleDTOPage;
    }



    @Override
    public void lockProductSale(Integer id) {
        ProductSale productSale = productSaleRepository.findById(id).orElseThrow();
        productSale.setStatus(false);
        productSaleRepository.save(productSale);

        ProductSaleDTO productSaleDTO = productSaleMapper.convertProductSaleToProductSaleDto(productSale);


    }

    @Override
    public void unLockProductSale(Integer id) {
        ProductSale productSale = productSaleRepository.findById(id).orElseThrow();
        productSale.setStatus(true);
        productSaleRepository.save(productSale);

        ProductSaleDTO productSaleDTO = productSaleMapper.convertProductSaleToProductSaleDto(productSale);

    }

    @Override
    public Page<ProductSaleDTO> getAll(Pageable pageable) {


        Page<ProductSale> productSales = productSaleRepository.findAll(pageable);
        Page<ProductSaleDTO> productSaleDTOPage = productSales.map(productSaleMapper::convertProductSaleToProductSaleDto);



        return productSaleDTOPage;
    }

    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }

}
