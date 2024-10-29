package com.web.bookstore.repository.product;

import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.product.ProductSale;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.JpaSpecificationExecutor;

public interface ProductSaleRepository extends JpaRepository<ProductSale,Integer>, JpaSpecificationExecutor<ProductSale> {
    ProductSale findByProduct(Product product);
}
