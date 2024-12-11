package com.web.bookstore.dto.orderDTO.ordersDTO;

import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailDTO;
import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
import com.web.bookstore.entity.other.Address;
import com.web.bookstore.entity.user.User;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;
import java.time.LocalDateTime;
import java.util.List;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class OrdersDTO {
    private Integer  id;
    private String username;
    private Integer quantity;
    private BigDecimal totalPrice;
    private AddressDTO address;
    private List<OrderDetailDTO> orderDetailDTOS;
    private String paymentStatus;
    private String orderStatus;
    private LocalDateTime date;
}
