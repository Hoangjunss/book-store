package com.web.bookstore.controller;

import com.web.bookstore.dto.cartDTO.cartDTO.CartDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.CategoryCreateDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.CategoryDTO;
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
    @PostMapping()
    public  ResponseEntity<CategoryDTO> create(@RequestBody CategoryCreateDTO categoryCreateDTO){
        CategoryDTO categoryDTO=categorySercive.create(categoryCreateDTO);
        return ResponseEntity.ok((categoryDTO));
    }
}
