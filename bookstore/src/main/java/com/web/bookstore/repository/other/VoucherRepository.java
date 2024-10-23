package com.web.bookstore.repository.other;

import com.web.bookstore.entity.other.Voucher;
import org.springframework.data.jpa.repository.JpaRepository;

public interface VoucherRepository extends JpaRepository<Voucher,Integer> {
}
