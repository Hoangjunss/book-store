package com.web.bookstore.service.product;

import com.web.bookstore.dto.productDTO.categoryDTO.CategoryCreateDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.CategoryDTO;
import org.springframework.stereotype.Service;

import java.util.List;
@Service
public interface CategorySercive {
    List<CategoryDTO> getAll();
    CategoryDTO getId(Integer id);
    CategoryDTO create(CategoryCreateDTO categoryCreateDTO);
}
