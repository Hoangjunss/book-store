package com.web.bookstore.mapper;

import com.web.bookstore.dto.productDTO.categoryDTO.CategoryCreateDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.CategoryDTO;
import com.web.bookstore.entity.product.Category;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;

@Component
public class CategoryMapper {

    @Autowired
    private ModelMapper modelMapper;

    public Category convertCategoryCreateDTOToCategory(CategoryCreateDTO categoryCreateDTO) {
        return modelMapper.map(categoryCreateDTO, Category.class);
    }

    public Category convertCategoryDTOToCategory(CategoryDTO categoryDTO) {
        return modelMapper.map(categoryDTO, Category.class);
    }

    public CategoryDTO convertCategoryToCategoryDTO(Category category) {
        return modelMapper.map(category, CategoryDTO.class);
    }

    public List<CategoryDTO> convertCategoryListToCategoryDTOList(List<Category> categories) {
        return categories.stream()
                .map(this::convertCategoryToCategoryDTO)
                .collect(Collectors.toList());
    }
}
