package com.web.bookstore.controller;

import com.web.bookstore.dto.warehouseDTO.warehouseDTO.WarehouseDTO;
import com.web.bookstore.service.warehouseService.WarehouseService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/warehouses")
public class WarehouseController {

    @Autowired
    private WarehouseService warehouseService;

    @GetMapping
    public ResponseEntity<Page<WarehouseDTO>> getAllWarehouses(
            @RequestParam(defaultValue = "0") int page,
            @RequestParam(defaultValue = "10") int size) {

        Pageable pageable = PageRequest.of(page, size);
        Page<WarehouseDTO> warehouses = warehouseService.getList(pageable);

        return ResponseEntity.ok(warehouses);
    }
    @GetMapping("/id")
    public ResponseEntity<Page<WarehouseDTO>> getAllWarehousesByIdProduct(
            @RequestParam(defaultValue = "0") int page,
            @RequestParam(defaultValue = "10") int size,
            @RequestParam Integer idProduct) {

        Pageable pageable = PageRequest.of(page, size);
        Page<WarehouseDTO> warehouses = warehouseService.getIdProduct(pageable,idProduct);

        return ResponseEntity.ok(warehouses);
    }
    @GetMapping("/idThan")
    public ResponseEntity<Page<WarehouseDTO>> getAllWarehousesByIdProductThan(
            @RequestParam(defaultValue = "0") int page,
            @RequestParam(defaultValue = "10") int size,
            @RequestParam Integer idProduct) {

        Pageable pageable = PageRequest.of(page, size);
        Page<WarehouseDTO> warehouses = warehouseService.getIdProductThanQuantity(pageable,idProduct);

        return ResponseEntity.ok(warehouses);
    }
}
