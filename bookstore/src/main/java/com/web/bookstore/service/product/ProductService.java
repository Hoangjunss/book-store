package com.web.bookstore.service.product;

import com.web.bookstore.dto.product.ProductCreateDTO;
import com.web.bookstore.dto.product.ProductDTO;

public interface ProductService {
    ProductDTO createProduct(ProductCreateDTO productDTO);
    ProductDTO updateProduct( ProductDTO productDTO);
    void deleteProduct(Integer id);
    ProductDTO findById(Integer id);
}
