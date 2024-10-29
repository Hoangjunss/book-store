package com.web.bookstore.service.warehouseService;


import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailCreateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailUpdateDTO;
import com.web.bookstore.entity.warehouse.WarehouseReceipt;
import com.web.bookstore.entity.warehouse.WarehouseReceiptDetail;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

public interface WarehouseReceiptDetailService {
    WarehouseReceiptDetail addWarehouseReceiptDetail(WarehouseReceipt warehouseReceipt, WarehouseReceiptDetailCreateDTO detailCreateDTO);
    WarehouseReceiptDetail updateWarehouseReceiptDetail(WarehouseReceipt warehouseReceipt, WarehouseReceiptDetailUpdateDTO detailUpdateDTO);
    Page<WarehouseReceiptDetailDTO> getList(Pageable pageable,Integer idWarehouse);
}
