package com.web.bookstore.repository.invoice;

import com.web.bookstore.entity.invoice.Invoice;
import org.springframework.data.jpa.repository.JpaRepository;

public interface InvoiceRepository extends JpaRepository<Invoice,Integer> {
}
