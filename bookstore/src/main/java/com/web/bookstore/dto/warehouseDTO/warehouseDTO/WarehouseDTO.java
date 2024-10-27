package com.web.bookstore.dto.warehouseDTO.warehouseDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;
import java.time.LocalDate;
@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
public class WarehouseDTO {

    private Integer id;
    private String productName;
    private Integer quantity;
    private BigDecimal price;
    private Boolean status;
    private LocalDate date;
}
