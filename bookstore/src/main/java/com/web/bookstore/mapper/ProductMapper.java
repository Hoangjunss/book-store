package com.web.bookstore.mapper;

import com.web.bookstore.dto.productDTO.productDTO.ProductCreateDTO;
import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;
import com.web.bookstore.entity.product.Category;
import com.web.bookstore.entity.product.Image;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.user.Supply;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class ProductMapper {
    @Autowired
    private ModelMapper modelMapper;
    public Product conventProductCreateDTOToProduct(ProductCreateDTO productCreateDTO){
        Product product=modelMapper.map(productCreateDTO,Product.class);

        return product;
    }
    public Product conventProductDTOToProduct(ProductDTO productDTO){
        Product product=modelMapper.map(productDTO,Product.class);

        return product;
    }

    public ProductDTO conventProductToProductDTO(Product product){
        ProductDTO productDTO=modelMapper.map(product,ProductDTO.class);
        productDTO.setCategory(product.getCategory().getName());
        productDTO.setImage(product.getImage().getUrl());
        productDTO.setSupply(product.getSupply().getName());
        return productDTO;
    }
}
