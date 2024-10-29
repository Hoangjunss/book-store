package com.web.bookstore.controller;

import com.web.bookstore.dto.productDTO.productDTO.ProductCreateDTO;
import com.web.bookstore.service.product.ProductService;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/product")
@CrossOrigin(origins = "*")
public class ProductController {
    @Autowired
    private ProductService productService;
    @PostMapping()
    public ResponseEntity<?> createProduct(@ModelAttribute @Valid ProductCreateDTO productCreateDTO) {
        return new ResponseEntity<>(productService.createProduct(productCreateDTO), HttpStatus.CREATED);
    }
    @PatchMapping()
    public ResponseEntity<?> updateProduct(@ModelAttribute @Valid ProductCreateDTO productCreateDTO) {
        return  ResponseEntity.ok(productService.updateProduct(productCreateDTO));
    }
    @DeleteMapping
    public ResponseEntity<?> deleteProduct(@RequestParam Integer id) {
        productService.deleteProduct(id);
        return  ResponseEntity.ok("delete success full");
    }
}
