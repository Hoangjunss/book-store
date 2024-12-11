package com.web.bookstore.service.other;

import com.web.bookstore.dto.otherDTO.voucherDTO.VoucherCreateDTO;
import com.web.bookstore.dto.otherDTO.voucherDTO.VoucherDTO;
import com.web.bookstore.entity.other.Voucher;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.VoucherMapper;
import com.web.bookstore.repository.other.VoucherRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.stream.Collectors;

@Service
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

    @Override
    public VoucherDTO toggleVoucherStatus(Integer id) {
        // Tìm Voucher theo ID
        Voucher voucher = voucherRepository.findById(id)
                .orElseThrow(() -> new CustomException(Error.VOUCHER_NOT_FOUND));

        // Nghịch đảo trạng thái
        voucher.setStatus(!voucher.getStatus());

        // Lưu lại Voucher đã cập nhật
        Voucher updatedVoucher = voucherRepository.save(voucher);

        // Chuyển đổi thành DTO và trả về
        return voucherMapper.convertVoucherToVoucherDTO(updatedVoucher);
    }

    @Override
    public List<VoucherDTO> findVouchersByNameContainingAndStatus(String name, boolean status) {
        // Tìm các Voucher chứa chuỗi tên bất kỳ và theo trạng thái
        List<Voucher> vouchers = voucherRepository.findByNameVoucherContainingAndStatus(name, status);

        // Chuyển đổi danh sách Entity sang DTO
        return vouchers.stream()
                .map(voucherMapper::convertVoucherToVoucherDTO)
                .collect(Collectors.toList());
    }
}
