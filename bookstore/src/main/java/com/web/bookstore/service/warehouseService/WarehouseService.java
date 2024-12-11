package com.web.bookstore.service.warehouseService;

import com.web.bookstore.dto.warehouseDTO.warehouseDTO.WarehouseDTO;
import com.web.bookstore.entity.product.Product;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import java.math.BigDecimal;
@Service
public interface WarehouseService {
    void updateWarehouse(Product product, Integer quantity, BigDecimal unitPrice);
    Page<WarehouseDTO> getList(Pageable pageable);
    WarehouseDTO getIdProduct(Integer id);
    Page<WarehouseDTO> getIdProductThanQuantity(Pageable pageable,Integer id);
}
