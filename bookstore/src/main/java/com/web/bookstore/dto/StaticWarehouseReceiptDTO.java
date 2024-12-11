package com.web.bookstore.dto;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;
@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
public class StaticWarehouseReceiptDTO {
    private Integer totalQuantity;
    private BigDecimal totalPrice;
}
