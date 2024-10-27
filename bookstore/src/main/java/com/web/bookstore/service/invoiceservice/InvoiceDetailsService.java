package com.web.bookstore.service.invoiceservice;

import com.web.bookstore.dto.invoiceDTO.invoicedetailDTO.InvoiceDetailCreateDTO;
import com.web.bookstore.dto.invoiceDTO.invoicedetailDTO.InvoiceDetailDTO;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public interface InvoiceDetailsService {
    List<InvoiceDetailDTO> getAllInvoiceDetailByIdInvoice(Integer idInvoice);
    InvoiceDetailDTO findById(Integer id);
    InvoiceDetailDTO create(InvoiceDetailCreateDTO invoiceDetailCreateDTO);
}
