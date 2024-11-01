package com.web.bookstore.controller;

import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleDTO;
import com.web.bookstore.service.productsaleService.ProductSaleService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/productsales")
public class ProductSaleController {
    @Autowired
    private ProductSaleService productSaleService;
    @PreAuthorize("permitAll()")
    @GetMapping
    public Page<ProductSaleDTO> getAllProductSales(
            @RequestParam(value = "title", required = false) String title,
            @RequestParam(value = "categoryId", required = false) Integer categoryId,
            @RequestParam(value = "saleStartPrice", required = false) Double saleStartPrice,
            @RequestParam(value = "saleEndPrice", required = false) Double saleEndPrice,
            @RequestParam(value = "page", defaultValue = "0") int page,
            @RequestParam(value = "size", defaultValue = "12") int size
    ) {
        PageRequest pageRequest = PageRequest.of(page, size);
        return productSaleService.getAllProductSales(title, categoryId, saleStartPrice, saleEndPrice, pageRequest);
    }
    @GetMapping("/id")
    public ResponseEntity<ProductSaleDTO> getProductSale(@RequestParam Integer id){
        return ResponseEntity.ok( productSaleService.findById(id));
    }
}
