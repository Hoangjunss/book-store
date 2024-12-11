package com.web.bookstore.controller;

import com.web.bookstore.dto.productDTO.supplyDTO.SupplyCreateDTO;
import com.web.bookstore.dto.productDTO.supplyDTO.SupplyDTO;
import com.web.bookstore.service.supply.SupplyService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/supplies")
public class SupplyController {

    @Autowired
    private SupplyService supplyService;

    // Create a new supply
    @PostMapping
    public ResponseEntity<SupplyDTO> createSupply(@RequestBody SupplyCreateDTO supplyCreateDTO) {
        SupplyDTO createdSupply = supplyService.createSupply(supplyCreateDTO);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdSupply);
    }

    // Update an existing supply
    @PutMapping("/{id}")
    public ResponseEntity<SupplyDTO> updateSupply(
            @RequestBody SupplyDTO supplyDTO) {

        SupplyDTO updatedSupply = supplyService.updateSupply(supplyDTO);
        return ResponseEntity.ok(updatedSupply);
    }

    // Soft delete a supply by setting its status to false
    @DeleteMapping("/{id}")
    public ResponseEntity<SupplyDTO> deleteSupply(@PathVariable Integer id) {
        SupplyDTO deletedSupply = supplyService.deleteSupply(id);
        return ResponseEntity.ok(deletedSupply);
    }

    @PutMapping("/toggle-status/{id}")
    public ResponseEntity<SupplyDTO> toggleSupplyStatus(@PathVariable Integer id) {
        SupplyDTO updatedSupply = supplyService.toggleSupplyStatus(id);
        return ResponseEntity.ok(updatedSupply);
    }


    // Retrieve a paginated list of supplies
    @GetMapping
    public ResponseEntity<Page<SupplyDTO>> getSupplies(
            @RequestParam(defaultValue = "0") int page,
            @RequestParam(defaultValue = "10") int size) {

        Pageable pageable = PageRequest.of(page, size);
        Page<SupplyDTO> supplyList = supplyService.getList(pageable);
        return ResponseEntity.ok(supplyList);
    }
    @GetMapping("/id")
    public ResponseEntity<SupplyDTO> getId(
           @RequestParam Integer id) {


        SupplyDTO supplyList = supplyService.findById(id);
        return ResponseEntity.ok(supplyList);
    }

    @GetMapping("/search-by-name-containing")
    public ResponseEntity<List<SupplyDTO>> findSuppliesByNameContaining(@RequestParam String name) {
        List<SupplyDTO> supplies = supplyService.findSuppliesByNameContaining(name);
        return ResponseEntity.ok(supplies);
    }
}
