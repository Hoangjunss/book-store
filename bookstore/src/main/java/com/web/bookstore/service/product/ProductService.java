package com.web.bookstore.service.product;

import com.web.bookstore.dto.productDTO.productDTO.ProductCreateDTO;
import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

public interface ProductService {
    ProductDTO createProduct(ProductCreateDTO productDTO);
    ProductDTO updateProduct( ProductCreateDTO productDTO);
    void deleteProduct(Integer id);
    ProductDTO findById(Integer id);
    Page<ProductDTO>getAll(Pageable pageable);
    Page<ProductDTO>getAllByCategory(Pageable pageable,Integer id);
    Page<ProductDTO>getAllSupply(Pageable pageable,Integer integer);
}
