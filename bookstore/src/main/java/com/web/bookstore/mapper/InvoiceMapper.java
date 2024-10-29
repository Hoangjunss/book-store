package com.web.bookstore.mapper;

import com.web.bookstore.dto.invoiceDTO.invoiceDTO.InvoiceCreateDTO;
import com.web.bookstore.dto.invoiceDTO.invoiceDTO.InvoiceDTO;
import com.web.bookstore.dto.invoiceDTO.invoicedetailDTO.InvoiceDetailDTO;
import com.web.bookstore.entity.invoice.Invoice;
import com.web.bookstore.entity.other.Address;
import com.web.bookstore.entity.user.User;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;

/**
 * Mapper class để chuyển đổi giữa Invoice và các DTO liên quan.
 */
@Component
public class InvoiceMapper {

    @Autowired
    private ModelMapper modelMapper;

    public Invoice convertInvoiceCreateDTOToInvoice(InvoiceCreateDTO invoiceCreateDTO) {
        Invoice invoice = modelMapper.map(invoiceCreateDTO, Invoice.class);

        return invoice;
    }

    public InvoiceDTO convertInvoiceToInvoiceDTO(Invoice invoice, List<InvoiceDetailDTO> invoiceDetailDTOS) {
        InvoiceDTO invoiceDTO= modelMapper.map(invoice, InvoiceDTO.class);
        invoiceDTO.setInvoiceDetailDTOS(invoiceDetailDTOS);
        return invoiceDTO;
    }


}
