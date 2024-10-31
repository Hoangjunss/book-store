package com.web.bookstore.repository.warehouse;

import com.web.bookstore.entity.warehouse.WarehouseReceipt;
import com.web.bookstore.entity.warehouse.WarehouseReceiptDetail;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface WarehouseReceiptDetailRepository extends JpaRepository<WarehouseReceiptDetail,Integer> {
    List<WarehouseReceiptDetail> findByWarehouseReceipt(WarehouseReceipt warehouseReceipt);
    Page<WarehouseReceiptDetail> findByWarehouseReceipt(WarehouseReceipt warehouseReceipt, Pageable pageable);
}
