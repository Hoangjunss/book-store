package com.web.bookstore.service.orders;

import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailCreateDTO;
import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailDTO;
import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailUpdateDTO;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public interface OrderDetailsService {
    List<OrderDetailDTO> findAllByOrder(Integer idOrder);
    OrderDetailDTO findById(Integer idOrderDetail);
    OrderDetailDTO create(OrderDetailCreateDTO orderDetailCreateDTO);
    OrderDetailDTO update(OrderDetailUpdateDTO orderDetailUpdateDTO);
}
