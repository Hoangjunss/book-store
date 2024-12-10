package com.web.bookstore.controller;

import com.web.bookstore.dto.cartDTO.cartDTO.CartDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.CategoryCreateDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.CategoryDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.StatisticsCategoryDTO;
import com.web.bookstore.service.product.CategorySercive;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/category")
public class CategoryController {
    @Autowired
    private CategorySercive categorySercive;
    @GetMapping()
    public ResponseEntity<List<CategoryDTO>> findAll() {
        List<CategoryDTO> categoryDTOList=categorySercive.getAll();
        return ResponseEntity.ok(categoryDTOList);
    }

    @GetMapping("/{id}")
    public ResponseEntity<CategoryDTO> findById(@PathVariable Integer id) {
        CategoryDTO categoryDTOList=categorySercive.getId(id);
        return ResponseEntity.ok(categoryDTOList);
    }

    @PostMapping()
    public  ResponseEntity<CategoryDTO> create(@RequestBody CategoryCreateDTO categoryCreateDTO){
        CategoryDTO categoryDTO=categorySercive.create(categoryCreateDTO);
        return ResponseEntity.ok((categoryDTO));
    }

    @GetMapping("/statistics")
    public ResponseEntity<List<StatisticsCategoryDTO>> getAllCategoryStatistics() {
        List<StatisticsCategoryDTO> statistics = categorySercive.getAllCategory();
        return ResponseEntity.ok(statistics);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteCategory(@PathVariable("id") Integer id) {
        categorySercive.deleteCategoryById(id);
        return ResponseEntity.noContent().build(); // Trả về HTTP 204 No Content
    }

    @GetMapping("/search")
    public ResponseEntity<List<StatisticsCategoryDTO>> searchCategoryByName(@RequestParam("name") String name) {
        List<StatisticsCategoryDTO> statistics = categorySercive.searchCategoryByName(name);
        return ResponseEntity.ok(statistics);
    }

}
