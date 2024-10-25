package com.web.bookstore.dto.warehouseDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;
import java.time.LocalDate;
import java.util.List;
@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
public class WarehouseReceiptDTO {
    private Integer id;

    private String supplyName;
    private Integer quantity;
    private BigDecimal totalPrice;
    private LocalDate date;
    private List<WarehouseReceiptDetailDTO> wareHouseReceiptDetailDTOS;
}
