package com.web.bookstore.service.warehouseService;

import com.web.bookstore.dto.warehouseDTO.WareHouseReceiptCreateDTO;
import com.web.bookstore.dto.warehouseDTO.WarehouseReceiptDTO;
import com.web.bookstore.dto.warehouseDTO.WarehouseReceiptUpdateDTO;

public interface WareHouseReceiptService {
    WarehouseReceiptDTO addWarehouseReceipt(WareHouseReceiptCreateDTO createDTO);
    WarehouseReceiptDTO updateWarehouseReceipt(WarehouseReceiptUpdateDTO updateDTO);
}
