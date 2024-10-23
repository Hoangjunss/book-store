package com.web.bookstore.service.product;

import com.web.bookstore.dto.product.ProductCreateDTO;
import com.web.bookstore.dto.product.ProductDTO;
import com.web.bookstore.repository.product.ProductRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class ProductServiceImpl implements ProductService {
    @Autowired
    private ProductRepository productRepository;

    @Override
    public ProductDTO createProduct(ProductCreateDTO productDTO) {
        return null;
    }

    @Override
    public ProductDTO updateProduct(ProductDTO productDTO) {
        return null;
    }

    @Override
    public void deleteProduct(Integer id) {

    }

    @Override
    public ProductDTO findById(Integer id) {
        return null;
    }
}
