package com.web.bookstore.dto.otherDTO.voucherDTO;

import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.user.User;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.time.LocalDate;
import java.util.List;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class VoucherDTO {
    private Integer id;
    private String nameVoucher;
    private Float percent;
    private LocalDate startDate;
    private LocalDate endDate;
    private List<Product> products;
    private List<User> users;
}
