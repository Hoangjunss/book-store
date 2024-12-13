package com.web.bookstore.dto.orderDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;
@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class StaticOrderDto {
    private Integer totalQuantity;
    private BigDecimal totalPrice;
}
