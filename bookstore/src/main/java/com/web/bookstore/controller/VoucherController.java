package com.web.bookstore.controller;

import com.web.bookstore.dto.otherDTO.voucherDTO.VoucherCreateDTO;
import com.web.bookstore.dto.otherDTO.voucherDTO.VoucherDTO;
import com.web.bookstore.dto.productDTO.supplyDTO.SupplyCreateDTO;
import com.web.bookstore.dto.productDTO.supplyDTO.SupplyDTO;
import com.web.bookstore.service.other.VoucherService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/voucher")
public class VoucherController {
    @Autowired
    private VoucherService voucherService;
    @PostMapping
    public ResponseEntity<VoucherDTO> createVoucher(@RequestBody VoucherCreateDTO voucherCreateDTO) {
        VoucherDTO createdVoucher = voucherService.createVoucher(voucherCreateDTO);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdVoucher);
    }

    // Soft delete a supply by setting its status to false
    @DeleteMapping()
    public ResponseEntity<?> deleteSupply(@RequestParam Integer id) {
      voucherService.deleteVoucher(id);
        return ResponseEntity.ok("delete");
    }

    // Retrieve a paginated list of supplies
    @GetMapping
    public ResponseEntity<Page<VoucherDTO>> getVoucher(
            @RequestParam(defaultValue = "0") int page,
            @RequestParam(defaultValue = "10") int size) {

        Pageable pageable = PageRequest.of(page, size);
        Page<VoucherDTO> voucherDTOS = voucherService.getAll(pageable);
        return ResponseEntity.ok(voucherDTOS);
    }

    @PutMapping("/toggle-status/{id}")
    public ResponseEntity<VoucherDTO> toggleVoucherStatus(@PathVariable Integer id) {
        VoucherDTO updatedVoucher = voucherService.toggleVoucherStatus(id);
        return ResponseEntity.ok(updatedVoucher);
    }

    @GetMapping("/search-by-name-containing-and-status")
    public ResponseEntity<List<VoucherDTO>> findVouchersByNameContainingAndStatus(
            @RequestParam String name,
            @RequestParam boolean status) {
        List<VoucherDTO> vouchers = voucherService.findVouchersByNameContainingAndStatus(name, status);
        return ResponseEntity.ok(vouchers);
    }

}
