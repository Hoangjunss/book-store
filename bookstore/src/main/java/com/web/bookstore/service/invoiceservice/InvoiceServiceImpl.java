package com.web.bookstore.service.invoiceservice;

import com.web.bookstore.dto.invoiceDTO.invoiceDTO.InvoiceCreateDTO;
import com.web.bookstore.dto.invoiceDTO.invoiceDTO.InvoiceDTO;
import com.web.bookstore.dto.invoiceDTO.invoicedetailDTO.InvoiceDetailCreateDTO;
import com.web.bookstore.dto.invoiceDTO.invoicedetailDTO.InvoiceDetailDTO;
import com.web.bookstore.entity.invoice.Invoice;
import com.web.bookstore.entity.other.Address;
import com.web.bookstore.entity.user.User;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.InvoiceMapper;
import com.web.bookstore.repository.invoice.InvoiceDetailRepository;
import com.web.bookstore.repository.invoice.InvoiceRepository;
import com.web.bookstore.repository.other.AddressRepository;
import com.web.bookstore.repository.user.UserRepository;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.stream.Collectors;

@Service
@Slf4j
public class InvoiceServiceImpl implements InvoiceService{
    @Autowired
    private InvoiceMapper invoiceMapper;

    @Autowired
    private InvoiceRepository invoiceRepository;

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private AddressRepository addressRepository;
    @Autowired
    private InvoiceDetailsService invoiceDetailsService;

    @Override
    public InvoiceDTO create(InvoiceCreateDTO invoiceCreateDTO) {
        log.info("Invoice crete: {}", invoiceCreateDTO.toString());

        User user = new User();

        Address address = addressRepository.findById(invoiceCreateDTO.getAddress().getId())
                .orElseThrow(()-> new CustomException(Error.ADDRESS_NOT_FOUND));

        Invoice invoice = invoiceMapper.convertInvoiceCreateDTOToInvoice(invoiceCreateDTO);
        Invoice invoice1=invoiceRepository.save(invoice);
        List<InvoiceDetailCreateDTO> invoiceDetailCreateDTOS=invoiceCreateDTO.getInvoiceCreateDTOS();
        List<InvoiceDetailDTO>invoiceDetailDTOS=invoiceDetailCreateDTOS.stream().map(invoiceDetailCreateDTO -> {
            return invoiceDetailsService.create(invoiceDetailCreateDTO,invoice1);
        }).collect(Collectors.toList());

        return invoiceMapper.convertInvoiceToInvoiceDTO(invoice1,invoiceDetailDTOS);
    }

    @Override
    public List<InvoiceDTO> findByUser(Integer idUser) {
        log.info("Find all invoices by user: {}", idUser);

        User user = userRepository.findById(idUser)
                .orElseThrow(()-> new CustomException(Error.USER_NOT_FOUND));

        List<Invoice> invoices = invoiceRepository.findAllByUser(user);
        List<InvoiceDTO> invoiceDTOS=invoices.stream().map(invoice -> {
            List<InvoiceDetailDTO> invoiceDetailDTOS=invoiceDetailsService.getAllInvoiceDetailByIdInvoice(invoice.getId());
            return invoiceMapper.convertInvoiceToInvoiceDTO(invoice,invoiceDetailDTOS);
        }).collect(Collectors.toList());
        return invoiceDTOS;
    }

    @Override
    public InvoiceDTO findById(Integer id) {
        log.info("Find invoice by id: {}", id);
      Invoice invoice=invoiceRepository.findById(id).orElseThrow();
        List<InvoiceDetailDTO> invoiceDetailDTOS=invoiceDetailsService.getAllInvoiceDetailByIdInvoice(invoice.getId());
        return invoiceMapper.convertInvoiceToInvoiceDTO(invoice,invoiceDetailDTOS);
    }
}
