package com.web.bookstore.service.product;

import com.web.bookstore.dto.productDTO.categoryDTO.CategoryCreateDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.CategoryDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.StatisticsCategoryDTO;
import org.springframework.stereotype.Service;

import java.util.List;
@Service
public interface CategorySercive {
    List<CategoryDTO> getAll();
    CategoryDTO getId(Integer id);
    CategoryDTO create(CategoryCreateDTO categoryCreateDTO);
    List<StatisticsCategoryDTO> getAllCategory();

    void deleteCategoryById(Integer categoryId);
    List<StatisticsCategoryDTO> searchCategoryByName(String name);
    CategoryDTO findById(Integer id);

}
