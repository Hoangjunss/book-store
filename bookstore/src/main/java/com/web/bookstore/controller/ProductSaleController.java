package com.web.bookstore.controller;

import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleDTO;
import com.web.bookstore.service.productsaleService.ProductSaleService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/productsales")
@CrossOrigin(origins = "*")
public class ProductSaleController {
    @Autowired
    private ProductSaleService productSaleService;

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
}
