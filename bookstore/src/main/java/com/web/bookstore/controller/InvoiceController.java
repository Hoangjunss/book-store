package com.web.bookstore.controller;

import com.web.bookstore.dto.invoiceDTO.invoiceDTO.InvoiceCreateDTO;
import com.web.bookstore.dto.invoiceDTO.invoiceDTO.InvoiceDTO;
import com.web.bookstore.service.invoiceservice.InvoiceService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/invoices")
public class InvoiceController {

    @Autowired
    private InvoiceService invoiceService;

    // Create a new invoice
    @PostMapping
    public ResponseEntity<InvoiceDTO> createInvoice(@RequestBody InvoiceCreateDTO invoiceCreateDTO) {
        InvoiceDTO createdInvoice = invoiceService.create(invoiceCreateDTO);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdInvoice);
    }

    // Retrieve all invoices for a specific user
    @GetMapping("/user")
    public ResponseEntity<List<InvoiceDTO>> findByUser(@RequestParam Integer idUser) {
        List<InvoiceDTO> invoices = invoiceService.findByUser(idUser);
        return ResponseEntity.ok(invoices);
    }

    // Retrieve a specific invoice by its ID
    @GetMapping("/{id}")
    public ResponseEntity<InvoiceDTO> findById(@PathVariable Integer id) {
        InvoiceDTO invoice = invoiceService.findById(id);
        return ResponseEntity.ok(invoice);
    }
}
