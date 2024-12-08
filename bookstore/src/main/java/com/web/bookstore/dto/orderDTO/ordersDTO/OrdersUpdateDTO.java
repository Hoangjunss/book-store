package com.web.bookstore.dto.orderDTO.ordersDTO;

import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
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
    private AddressDTO address;
    private String paymentStatus;
    private String orderStatus;
}
