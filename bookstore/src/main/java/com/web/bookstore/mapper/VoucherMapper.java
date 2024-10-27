package com.web.bookstore.mapper;

import com.web.bookstore.dto.otherDTO.voucherDTO.VoucherCreateDTO;
import com.web.bookstore.dto.otherDTO.voucherDTO.VoucherDTO;
import com.web.bookstore.entity.other.Voucher;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.user.User;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;

@Component
public class VoucherMapper {

    @Autowired
    private ModelMapper modelMapper;

    public Voucher convertVoucherCreateDTOToVoucher(VoucherCreateDTO voucherCreateDTO, List<Product> products, List<User> users) {
        Voucher voucher = modelMapper.map(voucherCreateDTO, Voucher.class);
        voucher.setProducts(products);
        voucher.setUsers(users);
        return voucher;
    }

    public Voucher convertVoucherDTOToVoucher(VoucherDTO voucherDTO, List<Product> products, List<User> users) {
        Voucher voucher = modelMapper.map(voucherDTO, Voucher.class);
        voucher.setProducts(products);
        voucher.setUsers(users);
        return voucher;
    }

    public VoucherDTO convertVoucherToVoucherDTO(Voucher voucher) {
        return modelMapper.map(voucher, VoucherDTO.class);
    }

    public List<VoucherDTO> convertVoucherListToVoucherDTOList(List<Voucher> vouchers) {
        return vouchers.stream()
                .map(this::convertVoucherToVoucherDTO)
                .collect(Collectors.toList());
    }
}
