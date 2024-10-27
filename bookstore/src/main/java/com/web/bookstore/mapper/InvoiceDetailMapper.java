package com.web.bookstore.mapper;

import com.web.bookstore.dto.invoiceDTO.invoicedetailDTO.InvoiceDetailCreateDTO;
import com.web.bookstore.dto.invoiceDTO.invoicedetailDTO.InvoiceDetailDTO;
import com.web.bookstore.entity.invoice.InvoiceDetail;
import com.web.bookstore.entity.invoice.Invoice;
import com.web.bookstore.entity.product.Product;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;

@Component
public class InvoiceDetailMapper {

    @Autowired
    private ModelMapper modelMapper;

    public InvoiceDetail convertInvoiceDetailCreateDTOToInvoiceDetail(InvoiceDetailCreateDTO invoiceDetailCreateDTO, Invoice invoice, Product product) {
        InvoiceDetail invoiceDetail = modelMapper.map(invoiceDetailCreateDTO, InvoiceDetail.class);
        invoiceDetail.setInvoice(invoice);
        invoiceDetail.setProduct(product);
        return invoiceDetail;
    }

    public InvoiceDetailDTO convertInvoiceDetailToInvoiceDetailDTO(InvoiceDetail invoiceDetail) {
        return modelMapper.map(invoiceDetail, InvoiceDetailDTO.class);
    }

    public List<InvoiceDetailDTO> convertInvoiceDetailListToInvoiceDetailDTOList(List<InvoiceDetail> invoiceDetails) {
        return invoiceDetails.stream()
                .map(this::convertInvoiceDetailToInvoiceDetailDTO)
                .collect(Collectors.toList());
    }
}
