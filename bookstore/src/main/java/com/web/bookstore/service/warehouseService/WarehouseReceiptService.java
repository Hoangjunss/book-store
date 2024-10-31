package com.web.bookstore.service.warehouseService;


import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WarehouseReceiptCreateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WarehouseReceiptDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WarehouseReceiptUpdateDTO;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

public interface WarehouseReceiptService {
    WarehouseReceiptDTO addWarehouseReceipt(WarehouseReceiptCreateDTO createDTO);
    WarehouseReceiptDTO updateWarehouseReceipt(WarehouseReceiptUpdateDTO updateDTO);
    Page<WarehouseReceiptDTO> getList(Pageable pageable);
}