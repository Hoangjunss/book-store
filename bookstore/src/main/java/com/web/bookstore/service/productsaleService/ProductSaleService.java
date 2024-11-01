package com.web.bookstore.service.productsaleService;

import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleCreateDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleUpdateDTO;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

@Service
public interface ProductSaleService {
    ProductSaleDTO createProductSale(ProductSaleCreateDTO createDTO);
    ProductSaleDTO updateProductSale(ProductSaleUpdateDTO updateDTO);
    Page<ProductSaleDTO> getAllProductSales(String title, Integer categoryId, Double saleStartPrice, Double saleEndPrice, Pageable pageable);
    ProductSaleDTO findById(Integer id);
}
