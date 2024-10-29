package com.web.bookstore.service.invoiceservice;

import com.web.bookstore.dto.invoiceDTO.invoicedetailDTO.InvoiceDetailCreateDTO;
import com.web.bookstore.dto.invoiceDTO.invoicedetailDTO.InvoiceDetailDTO;
import com.web.bookstore.entity.invoice.Invoice;
import com.web.bookstore.entity.invoice.InvoiceDetail;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.InvoiceDetailMapper;
import com.web.bookstore.repository.invoice.InvoiceDetailRepository;
import com.web.bookstore.repository.invoice.InvoiceRepository;
import com.web.bookstore.repository.product.ProductRepository;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
@Slf4j
public class InvoiceDetailsServiceImpl implements InvoiceDetailsService{
    @Autowired
    private InvoiceDetailMapper invoiceDetailMapper;

    @Autowired
    private InvoiceDetailRepository invoiceDetailRepository;

    @Autowired
    private InvoiceRepository invoiceRepository;

    @Autowired
    private ProductRepository productRepository;

    @Override
    public List<InvoiceDetailDTO> getAllInvoiceDetailByIdInvoice(Integer idInvoice) {
        log.info("Get all invoice detail by id invoice: {}", idInvoice);

        Invoice invoice = invoiceRepository.findById(idInvoice)
                .orElseThrow(()-> new CustomException(Error.INVOICE_NOT_FOUND));

        List<InvoiceDetail> invoiceDetails = invoiceDetailRepository.findAllByInvoice(invoice);

        return invoiceDetailMapper.convertInvoiceDetailListToInvoiceDetailDTOList(invoiceDetails);
    }

    @Override
    public InvoiceDetailDTO findById(Integer id) {
        log.info("Get invoice detail by id: {}", id);
        return invoiceDetailMapper.convertInvoiceDetailToInvoiceDetailDTO(
                invoiceDetailRepository.findById(id)
                       .orElseThrow(() -> new CustomException(Error.INVOICEDETAIL_NOT_FOUND))
        );
    }

    @Override
    public InvoiceDetailDTO create(InvoiceDetailCreateDTO invoiceDetailCreateDTO,Invoice invoice) {
        log.info("Create new invoice detail: {}", invoiceDetailCreateDTO.toString());



        Product product = productRepository.findById(invoiceDetailCreateDTO.getProductId())
                .orElseThrow(()-> new CustomException(Error.PRODUCT_NOT_FOUND));

        InvoiceDetail invoiceDetail = invoiceDetailMapper.convertInvoiceDetailCreateDTOToInvoiceDetail(invoiceDetailCreateDTO, invoice, product);

        return invoiceDetailMapper.convertInvoiceDetailToInvoiceDetailDTO(
                invoiceDetailRepository.save(invoiceDetail)
        );
    }
}
