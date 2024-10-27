package com.web.bookstore.service.warehouseService;

import com.web.bookstore.dto.warehouseDTO.WarehouseReceiptDetailCreateDTO;
import com.web.bookstore.dto.warehouseDTO.WarehouseReceiptDetailUpdateDTO;
import com.web.bookstore.entity.warehouse.WarehouseReceipt;
import com.web.bookstore.entity.warehouse.WarehouseReceiptDetail;

public interface WarehouseReceiptDetailService {
    WarehouseReceiptDetail addWarehouseReceiptDetail(WarehouseReceipt warehouseReceipt, WarehouseReceiptDetailCreateDTO detailCreateDTO);
    WarehouseReceiptDetail updateWarehouseReceiptDetail(WarehouseReceipt warehouseReceipt, WarehouseReceiptDetailUpdateDTO detailUpdateDTO);
}
