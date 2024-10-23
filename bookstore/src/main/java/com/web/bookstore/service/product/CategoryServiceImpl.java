package com.web.bookstore.service.product;

import com.web.bookstore.dto.product.CategoryDTO;
import com.web.bookstore.entity.product.Category;
import com.web.bookstore.mapper.CategoryMapper;
import com.web.bookstore.repository.product.CategoryRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class CategoryServiceImpl implements CategoryService{
    @Autowired
    private CategoryRepository categoryRepository;
    @Autowired
    private CategoryMapper categoryMapper;

    @Override
    public CategoryDTO createCategory(CategoryDTO categoryDTO) {
        Category category=categoryMapper.conventCategoryDTOtoCategory(categoryDTO);
        return categoryMapper.conventCategorytoCategoryDTO(categoryRepository.save(category));
    }

    @Override
    public CategoryDTO updateCategory(CategoryDTO categoryDTO) {
        Category category=categoryRepository.findById(categoryDTO.getId()).orElseThrow();
        category.setName(categoryDTO.getName());

        return categoryMapper.conventCategorytoCategoryDTO(categoryRepository.save(category));
    }

    @Override
    public Category findById(Integer id) {
        return categoryRepository.findById(id).orElseThrow();
    }
}
