package com.web.bookstore.repository.product;

import com.web.bookstore.entity.product.ProductSale;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ProductSaleRepository extends JpaRepository<ProductSale,Integer> {
}
