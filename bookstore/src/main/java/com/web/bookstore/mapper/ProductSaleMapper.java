package com.web.bookstore.mapper;

import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleCreateDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleUpdateDTO;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.product.ProductSale;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;

@Component
public class ProductSaleMapper {

    @Autowired
    private ModelMapper mapper;

    public ProductSale convertProductSaleCreateDtoToProductSale(ProductSaleCreateDTO createDTO, Product product) {
        ProductSale productSale = mapper.map(createDTO, ProductSale.class);
        productSale.setProduct(product);
        return productSale;
    }

    public ProductSale convertProductSaleUpdateDtoToProductSale(ProductSaleUpdateDTO updateDTO, Product product) {
        ProductSale productSale = mapper.map(updateDTO, ProductSale.class);
        productSale.setProduct(product);
        return productSale;
    }

    public ProductSale convertProductSaleDtoToProductSale(ProductSaleDTO productSaleDTO, Product product){
        ProductSale productSale = mapper.map(productSaleDTO, ProductSale.class);
        productSale.setProduct(product);
        return productSale;
    }

    public ProductSaleDTO convertProductSaleToProductSaleDto(ProductSale productSale){
        return mapper.map(productSale, ProductSaleDTO.class);
    }

    public List<ProductSaleDTO> convertToDTOList(List<ProductSale> productSales) {
        return productSales.stream()
                .map(this::convertProductSaleToProductSaleDto)
                .collect(Collectors.toList());
    }
}