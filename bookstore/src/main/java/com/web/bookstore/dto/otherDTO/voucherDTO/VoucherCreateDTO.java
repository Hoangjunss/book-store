package com.web.bookstore.dto.otherDTO.voucherDTO;

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
public class VoucherCreateDTO {
    private Integer id;
    private String nameVoucher;
    private Float percent;
    private LocalDate startDate;
    private LocalDate endDate;
    private Boolean status;
}
