package com.web.bookstore.dto.orderDTO.ordersDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class OrdersUpdateDTO {
    private Integer  id;
    private Integer userId;
    private Integer quantity;
    private BigDecimal totalPrice;
    private Integer addressId;
}
