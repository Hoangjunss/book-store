package com.web.bookstore.service.orders;

import com.paypal.api.payments.Order;
import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailCreateDTO;
import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailDTO;
import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailUpdateDTO;
import com.web.bookstore.entity.cart.CartDetail;
import com.web.bookstore.entity.order.Orders;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public interface OrderDetailsService {
    List<OrderDetailDTO> findAllByOrder(Integer idOrder);
    OrderDetailDTO findById(Integer idOrderDetail);
    OrderDetailDTO create(OrderDetailCreateDTO orderDetailCreateDTO);
    OrderDetailDTO update(OrderDetailUpdateDTO orderDetailUpdateDTO);
    List<OrderDetailDTO> createByCartDetail(Orders order, List<CartDetail> cartDetails);
}
