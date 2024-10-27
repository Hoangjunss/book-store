package com.web.bookstore.service.invoiceservice;

import com.web.bookstore.dto.invoiceDTO.invoiceDTO.InvoiceCreateDTO;
import com.web.bookstore.dto.invoiceDTO.invoiceDTO.InvoiceDTO;
import com.web.bookstore.entity.invoice.Invoice;
import com.web.bookstore.entity.other.Address;
import com.web.bookstore.entity.user.User;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.InvoiceMapper;
import com.web.bookstore.repository.invoice.InvoiceRepository;
import com.web.bookstore.repository.other.AddressRepository;
import com.web.bookstore.repository.user.UserRepository;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

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

    @Override
    public InvoiceDTO create(InvoiceCreateDTO invoiceCreateDTO) {
        log.info("Invoice crete: {}", invoiceCreateDTO.toString());

        User user = userRepository.findById(invoiceCreateDTO.getUserId())
                .orElseThrow(()-> new CustomException(Error.USER_NOT_FOUND));

        Address address = addressRepository.findById(invoiceCreateDTO.getAddressId())
                .orElseThrow(()-> new CustomException(Error.ADDRESS_NOT_FOUND));

        Invoice invoice = invoiceMapper.convertInvoiceCreateDTOToInvoice(invoiceCreateDTO, user, address);

        return invoiceMapper.convertInvoiceToInvoiceDTO(invoiceRepository.save(invoice));
    }

    @Override
    public List<InvoiceDTO> findByUser(Integer idUser) {
        log.info("Find all invoices by user: {}", idUser);

        User user = userRepository.findById(idUser)
                .orElseThrow(()-> new CustomException(Error.USER_NOT_FOUND));

        List<Invoice> invoices = invoiceRepository.findAllByUser(user);
        return invoiceMapper.convertInvoiceListToInvoiceDTOList(invoices);
    }

    @Override
    public InvoiceDTO findById(Integer id) {
        log.info("Find invoice by id: {}", id);
        return invoiceMapper.convertInvoiceToInvoiceDTO(
                invoiceRepository.findById(id)
                       .orElseThrow(()-> new CustomException(Error.INVOICE_NOT_FOUND))
        );
    }
}
