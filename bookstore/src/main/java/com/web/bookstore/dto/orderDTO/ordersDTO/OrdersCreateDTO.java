package com.web.bookstore.dto.orderDTO.ordersDTO;

import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailCreateDTO;
import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;
import java.util.List;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class OrdersCreateDTO {
    private AddressDTO address;
    private String paymentStatus;
    private String orderStatus;
}
