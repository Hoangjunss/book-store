package com.web.bookstore.service.invoiceservice;

import com.web.bookstore.dto.invoiceDTO.invoiceDTO.InvoiceCreateDTO;
import com.web.bookstore.dto.invoiceDTO.invoiceDTO.InvoiceDTO;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public interface InvoiceService {
    InvoiceDTO create(InvoiceCreateDTO invoiceCreateDTO);
    List<InvoiceDTO> findByUser(Integer idUser);
    InvoiceDTO findById(Integer id);
}
