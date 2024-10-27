package com.web.bookstore.repository.warehouse;

import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.warehouse.Warehouse;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.Optional;

public interface WarehouseRepository extends JpaRepository<Warehouse,Integer> {
    Optional<Warehouse> findByProduct(Product product);
    Optional<Warehouse> findByProductId(Integer productId);
}
