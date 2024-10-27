package com.web.bookstore.repository.invoice;

import com.web.bookstore.entity.invoice.Invoice;
import com.web.bookstore.entity.invoice.InvoiceDetail;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface InvoiceDetailRepository extends JpaRepository<InvoiceDetail,Integer> {
    List<InvoiceDetail> findAllByInvoice(Invoice invoice);
}
