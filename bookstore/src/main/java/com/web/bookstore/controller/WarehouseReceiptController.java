package com.web.bookstore.controller;

import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WarehouseReceiptCreateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WarehouseReceiptDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WarehouseReceiptUpdateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailDTO;
import com.web.bookstore.service.warehouseService.WarehouseReceiptDetailService;
import com.web.bookstore.service.warehouseService.WarehouseReceiptDetailServiceImpl;
import com.web.bookstore.service.warehouseService.WarehouseReceiptService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/warehouse-receipts")
public class WarehouseReceiptController {

    @Autowired
    private WarehouseReceiptService warehouseReceiptService;
    @Autowired
    private WarehouseReceiptDetailService warehouseReceiptDetailService;

    // Add a new warehouse receipt
    @PostMapping
    public ResponseEntity<WarehouseReceiptDTO> addWarehouseReceipt(@RequestBody WarehouseReceiptCreateDTO createDTO) {
        WarehouseReceiptDTO createdReceipt = warehouseReceiptService.addWarehouseReceipt(createDTO);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdReceipt);
    }

    // Update an existing warehouse receipt
    @PutMapping("/{id}")
    public ResponseEntity<WarehouseReceiptDTO> updateWarehouseReceipt(
            @PathVariable Integer id,
            @RequestBody WarehouseReceiptUpdateDTO updateDTO) {

        // Set the ID in the DTO to ensure it’s updated correctly
        updateDTO.setId(id);
        WarehouseReceiptDTO updatedReceipt = warehouseReceiptService.updateWarehouseReceipt(updateDTO);
        return ResponseEntity.ok(updatedReceipt);
    }

    @GetMapping("/warehouse")
    public ResponseEntity<Page<WarehouseReceiptDTO>> getAllWarehouseReceipts(
            @RequestParam(defaultValue = "0") int page,
            @RequestParam(defaultValue = "10") int size) {

        Pageable pageable = PageRequest.of(page, size);
        Page<WarehouseReceiptDTO> warehouseReceipts = warehouseReceiptService.getList(pageable);

        return ResponseEntity.ok(warehouseReceipts);
    }
    @GetMapping
    public ResponseEntity<Page<WarehouseReceiptDetailDTO>> getAllWarehouseReceiptDetails(
            @PathVariable Integer idWarehouse,
            @RequestParam(defaultValue = "0") int page,
            @RequestParam(defaultValue = "10") int size) {

        Pageable pageable = PageRequest.of(page, size);
        Page<WarehouseReceiptDetailDTO> details = warehouseReceiptDetailService.getList(pageable, idWarehouse);

        return ResponseEntity.ok(details);
    }
    @GetMapping("/id")
    public ResponseEntity<WarehouseReceiptDTO> getId(@RequestParam Integer id){
        WarehouseReceiptDTO warehouseReceiptDTO=warehouseReceiptService.findById(id);
        return ResponseEntity.ok(warehouseReceiptDTO);
    }
}
