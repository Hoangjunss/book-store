package com.web.bookstore.repository.invoice;

import com.web.bookstore.entity.invoice.Invoice;
import com.web.bookstore.entity.user.User;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface InvoiceRepository extends JpaRepository<Invoice,Integer> {
    List<Invoice> findAllByUser(User user);
}
