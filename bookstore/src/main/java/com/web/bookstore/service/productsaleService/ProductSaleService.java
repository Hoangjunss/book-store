package com.web.bookstore.service.productsaleService;

import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleCreateDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleDTO;
import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleUpdateDTO;
import com.web.bookstore.entity.product.Product;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

@Service
public interface ProductSaleService {
    ProductSaleDTO createProductSale(Product product);
    ProductSaleDTO updateProductSale(ProductSaleUpdateDTO updateDTO);
    Page<ProductSaleDTO> getAllProductSales(String title, Integer categoryId, Double saleStartPrice, Double saleEndPrice, Pageable pageable);
    ProductSaleDTO findById(Integer id);
    Page<ProductSaleDTO> getAllProductSaleBySuplly(Integer Id,Pageable pageable);
    void lockProductSale(Integer id);
    void unLockProductSale(Integer id);
    Page<ProductSaleDTO>getAll(Pageable pageable);
}
