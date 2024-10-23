package com.web.bookstore.mapper;

import com.web.bookstore.dto.product.ProductCreateDTO;
import com.web.bookstore.entity.product.Category;
import com.web.bookstore.entity.product.Image;
import com.web.bookstore.entity.product.Product;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;

public class ProductMapper {
    @Autowired
    private ModelMapper modelMapper;
    public Product conventProductCreateDTOToProduct(ProductCreateDTO productCreateDTO, Category category, Image image){
        Product product=modelMapper.map(productCreateDTO,Product.class);
        product.setCategory(category);
        product.setImage(image);
        return product;
    }
}
