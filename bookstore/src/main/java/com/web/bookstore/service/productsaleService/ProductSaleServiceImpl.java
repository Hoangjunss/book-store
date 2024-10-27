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
import org.springframework.beans.factory.annotation.Autowired;

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
        Optional<Warehouse> warehouseOptional = warehouseRepository.findByProductId(createDTO.getProductId());
        if (!warehouseOptional.isPresent()) {
            throw new RuntimeException("Product not found in warehouse");
        }

        Warehouse warehouse = warehouseOptional.get();
        Product product = warehouse.getProduct();

        // Check if there is enough quantity in warehouse
        if (warehouse.getQuantity() < createDTO.getQuantity()) {
            throw new RuntimeException("Insufficient quantity in warehouse");
        }

        // Use mapper to convert DTO to ProductSale entity
        ProductSale productSale = productSaleMapper.convertProductSaleCreateDtoToProductSale(createDTO, product);

        // Save ProductSale to the database
        ProductSale savedProductSale = productSaleRepository.save(productSale);

        // Update warehouse quantity
        warehouse.setQuantity(warehouse.getQuantity() - createDTO.getQuantity());
        warehouseRepository.save(warehouse);

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
        existingProductSale = productSaleMapper.convertProductSaleUpdateDtoToProductSale(updateDTO, product);
        existingProductSale.setId(updateDTO.getId()); // Ensure the ID is set

        // Save updated ProductSale to the database
        ProductSale savedProductSale = productSaleRepository.save(existingProductSale);

        // Convert saved ProductSale to DTO and return
        ProductSaleDTO productSaleDTO = productSaleMapper.convertProductSaleToProductSaleDto(savedProductSale);
        return productSaleDTO;
    }
}
