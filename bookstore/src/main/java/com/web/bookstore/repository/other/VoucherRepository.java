package com.web.bookstore.repository.other;

import com.web.bookstore.entity.other.Voucher;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface VoucherRepository extends JpaRepository<Voucher,Integer> {
    List<Voucher> findByNameContainingAndStatus(String name, boolean status);
}
