package com.web.bookstore.service.orders;

import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersCreateDTO;
import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersDTO;
import com.web.bookstore.entity.user.User;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public interface OrdersService {
    List<OrdersDTO> findAllOrdersByUser(Integer idUser);
    OrdersDTO findById(Integer idOder);
    OrdersDTO create(OrdersCreateDTO ordersCreateDTO);
}
