package com.web.bookstore.controller;

import com.web.bookstore.dto.product.CategoryDTO;
import com.web.bookstore.dto.product.ProductCreateDTO;
import com.web.bookstore.service.product.CategoryService;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/category")
public class CategoryController {
    @Autowired
    private CategoryService categoryService;
    @PostMapping()
    public ResponseEntity<?> createProduct(@RequestBody CategoryDTO categoryDTO) {
        return new ResponseEntity<>(categoryService.createCategory(categoryDTO), HttpStatus.CREATED);
    }
    @PatchMapping()
    public ResponseEntity<?> updateProduct(@RequestBody CategoryDTO categoryDTO) {
        return  ResponseEntity.ok(categoryService.updateCategory(categoryDTO));
    }
}
