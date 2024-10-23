package com.web.bookstore.mapper;

import com.web.bookstore.dto.product.CategoryDTO;
import com.web.bookstore.entity.product.Category;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class CategoryMapper {
    @Autowired
    private ModelMapper mapper;
    public Category conventCategoryDTOtoCategory(CategoryDTO category){
        return mapper.map(category, Category.class);
    }
    public CategoryDTO conventCategorytoCategoryDTO(Category category){
        return mapper.map(category, CategoryDTO.class);
    }
}
