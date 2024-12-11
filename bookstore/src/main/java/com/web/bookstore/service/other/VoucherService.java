package com.web.bookstore.service.other;

import com.web.bookstore.dto.otherDTO.voucherDTO.VoucherCreateDTO;
import com.web.bookstore.dto.otherDTO.voucherDTO.VoucherDTO;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public interface VoucherService {
    VoucherDTO createVoucher(VoucherCreateDTO voucherCreateDTO);
    void deleteVoucher(Integer id);
    Page<VoucherDTO> getAll(Pageable pageable);
    VoucherDTO toggleVoucherStatus(Integer id);
    List<VoucherDTO> findVouchersByNameContainingAndStatus(String name, boolean status);
}
