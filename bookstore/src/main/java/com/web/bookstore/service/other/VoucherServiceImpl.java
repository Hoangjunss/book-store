package com.web.bookstore.service.other;

import com.web.bookstore.dto.otherDTO.voucherDTO.VoucherCreateDTO;
import com.web.bookstore.dto.otherDTO.voucherDTO.VoucherDTO;
import com.web.bookstore.entity.other.Voucher;
import com.web.bookstore.mapper.VoucherMapper;
import com.web.bookstore.repository.other.VoucherRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

public class VoucherServiceImpl implements VoucherService{
    @Autowired
    private VoucherMapper voucherMapper;
    @Autowired
    private VoucherRepository voucherRepository;
    @Override
    public VoucherDTO createVoucher(VoucherCreateDTO voucherCreateDTO) {
        Voucher voucher=voucherMapper.convertVoucherCreateDTOToVoucher(voucherCreateDTO);
        return voucherMapper.convertVoucherToVoucherDTO(voucherRepository.save(voucher));
    }

    @Override
    public void deleteVoucher(Integer id) {
            Voucher voucher=voucherRepository.findById(id).orElseThrow();
            voucher.setStatus(false);
            voucherRepository.save(voucher);
    }

    @Override
    public Page<VoucherDTO> getAll(Pageable pageable) {
       Page<Voucher> vouchers=voucherRepository.findAll(pageable);
       return vouchers.map(voucherMapper::convertVoucherToVoucherDTO);
    }
}
