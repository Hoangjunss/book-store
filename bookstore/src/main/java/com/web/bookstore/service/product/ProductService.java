package com.web.bookstore.service.product;

import com.web.bookstore.dto.productDTO.productDTO.ProductCreateDTO;
import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;

public interface ProductService {
    ProductDTO createProduct(ProductCreateDTO productDTO);
    ProductDTO updateProduct( ProductCreateDTO productDTO);
    void deleteProduct(Integer id);
    ProductDTO findById(Integer id);
}
