package com.web.bookstore.repository.invoice;

import com.web.bookstore.entity.invoice.InvoiceDetail;
import org.springframework.data.jpa.repository.JpaRepository;

public interface InvoiceDetailRepository extends JpaRepository<InvoiceDetail,Integer> {
}
