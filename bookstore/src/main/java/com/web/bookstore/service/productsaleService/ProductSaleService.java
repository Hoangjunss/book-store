package com.web.bookstore.service.productsaleService;

import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleCreateDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleUpdateDTO;

public interface ProductSaleService {
    ProductSaleDTO createProductSale(ProductSaleCreateDTO createDTO);
    ProductSaleDTO updateProductSale(ProductSaleUpdateDTO updateDTO);
}
