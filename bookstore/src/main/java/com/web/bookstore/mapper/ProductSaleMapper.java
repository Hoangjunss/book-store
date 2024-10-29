package com.web.bookstore.mapper;

import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;
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
    @Autowired
    private ProductMapper productMapper;

    public ProductSale convertProductSaleCreateDtoToProductSale(ProductSaleCreateDTO createDTO) {
        ProductSale productSale = mapper.map(createDTO, ProductSale.class);

        return productSale;
    }

    public ProductSale convertProductSaleUpdateDtoToProductSale(ProductSaleUpdateDTO updateDTO) {
        ProductSale productSale = mapper.map(updateDTO, ProductSale.class);

        return productSale;
    }

    public ProductSale convertProductSaleDtoToProductSale(ProductSaleDTO productSaleDTO){
        ProductSale productSale = mapper.map(productSaleDTO, ProductSale.class);
        return productSale;
    }

    public ProductSaleDTO convertProductSaleToProductSaleDto(ProductSale productSale){
        ProductSaleDTO productSaleDTO= mapper.map(productSale, ProductSaleDTO.class);
        ProductDTO product=productMapper.conventProductToProductDTO(productSale.getProduct());
        productSaleDTO.setProduct(product);
        return productSaleDTO;

    }

    public List<ProductSaleDTO> convertToDTOList(List<ProductSale> productSales) {
        return productSales.stream()
                .map(this::convertProductSaleToProductSaleDto)
                .collect(Collectors.toList());
    }
}