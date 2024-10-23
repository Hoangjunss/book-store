package com.web.bookstore.repository.warehouse;

import com.web.bookstore.entity.warehouse.Warehouse;
import org.springframework.data.jpa.repository.JpaRepository;

public interface WarehouseRepository extends JpaRepository<Warehouse,Integer> {
}
