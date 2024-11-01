package com.web.bookstore.controller;

import com.web.bookstore.dto.productDTO.productDTO.ProductCreateDTO;
import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;
import com.web.bookstore.service.product.ProductService;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/product")
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
    @PreAuthorize("permitAll()")
    @GetMapping
    public ResponseEntity<Page<ProductDTO>> getAllProducts(
            @RequestParam(defaultValue = "0") int page,
            @RequestParam(defaultValue = "10") int size) {

        Pageable pageable = PageRequest.of(page, size);
        Page<ProductDTO> products = productService.getAll(pageable);

        return ResponseEntity.ok(products);
    }
}
