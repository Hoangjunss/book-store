package com.web.bookstore.repository.warehouse;


import com.web.bookstore.entity.warehouse.WarehouseReceipt;
import org.springframework.data.jpa.repository.JpaRepository;

public interface WarehouseReceiptRepository extends JpaRepository<WarehouseReceipt,Integer> {
}
