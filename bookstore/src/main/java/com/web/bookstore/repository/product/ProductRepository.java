package com.web.bookstore.repository.product;

import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;
import com.web.bookstore.entity.product.Category;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.user.Supply;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.JpaSpecificationExecutor;

public interface ProductRepository extends JpaRepository<Product,Integer>, JpaSpecificationExecutor<Product> {
    long count();
    Page<Product>findAllByCategory(Pageable pageable, Category category);
}
