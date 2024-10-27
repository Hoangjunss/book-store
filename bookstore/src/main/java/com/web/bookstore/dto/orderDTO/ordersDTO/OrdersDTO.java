package com.web.bookstore.dto.orderDTO.ordersDTO;

import com.web.bookstore.entity.other.Address;
import com.web.bookstore.entity.user.User;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class OrdersDTO {
    private Integer  id;
    private User user;
    private Integer quantity;
    private BigDecimal totalPrice;
    private Address address;
}
