package com.web.bookstore.controller;

import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleCreateDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleUpdateDTO;
import com.web.bookstore.service.productsaleService.ProductSaleService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
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
    @PostMapping()
    public ResponseEntity<ProductSaleDTO> createProductSale(@RequestBody ProductSaleCreateDTO productSaleCreateDTO){
        return ResponseEntity.ok(productSaleService.createProductSale(productSaleCreateDTO));
    }
    @PatchMapping()
    public ResponseEntity<ProductSaleDTO> addProductSale(@RequestBody ProductSaleUpdateDTO productSaleCreateDTO){
        return ResponseEntity.ok(productSaleService.updateProductSale(productSaleCreateDTO));
    }
    @GetMapping("/supply")
    public ResponseEntity<Page<ProductSaleDTO>> getSupply(@RequestParam Integer id,  @RequestParam(value = "page", defaultValue = "0") int page,
                                                          @RequestParam(value = "size", defaultValue = "12") int size){
        Pageable pageRequest = PageRequest.of(page, size);
        return ResponseEntity.ok(productSaleService.getAllProductSaleBySuplly(id,pageRequest));
    }
    @GetMapping("/admin")
    public ResponseEntity<Page<ProductSaleDTO>> getProductAdmin( @RequestParam(value = "page", defaultValue = "0") int page,
                                                                 @RequestParam(value = "size", defaultValue = "12") int size){
        Pageable pageRequest = PageRequest.of(page, size);
        return ResponseEntity.ok(productSaleService.getAll(pageRequest));
    }
    @PostMapping("/lock")
    public ResponseEntity<?> lock(@RequestParam Integer integer){
        productSaleService.lockProductSale(integer);
        return ResponseEntity.ok("Product sale locked successfully");
    }
    @PostMapping("/unlock")
    public ResponseEntity<?> unlock(@RequestParam Integer integer){
        productSaleService.unLockProductSale(integer);
        return ResponseEntity.ok("Product sale unlocked successfully");
    }
}
