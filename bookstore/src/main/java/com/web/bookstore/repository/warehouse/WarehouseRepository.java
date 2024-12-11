package com.web.bookstore.repository.warehouse;

import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.warehouse.Warehouse;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.Optional;

public interface WarehouseRepository extends JpaRepository<Warehouse,Integer> {

    Warehouse findByProduct(Product product);
    Page<Warehouse> findAllByProductAndQuantityGreaterThan(Pageable pageable, Product product, int quantity);
}
