package com.web.bookstore.service.warehouseService;

import com.web.bookstore.entity.product.Product;

import java.math.BigDecimal;

public interface WarehouseService {
    void updateWarehouse(Product product, Integer quantity, BigDecimal unitPrice);
}
