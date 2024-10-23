package com.web.bookstore.service.product;

import com.web.bookstore.dto.product.CategoryDTO;
import com.web.bookstore.entity.product.Category;

public interface CategoryService {
    CategoryDTO createCategory(CategoryDTO categoryDTO);
    CategoryDTO updateCategory(CategoryDTO categoryDTO);
    Category findById(Integer id);
}
