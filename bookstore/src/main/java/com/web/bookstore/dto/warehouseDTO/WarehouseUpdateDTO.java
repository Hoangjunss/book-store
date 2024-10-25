package com.web.bookstore.dto.warehouseDTO;

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
public class WarehouseUpdateDTO {
    private Integer id;
    private Integer idProduct;
    private Integer quantity;
    private BigDecimal price;
    private Boolean status;
    private LocalDate date;
}
