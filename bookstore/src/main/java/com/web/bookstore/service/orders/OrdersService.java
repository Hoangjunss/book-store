package com.web.bookstore.service.orders;

import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersCreateDTO;
import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersDTO;
import com.web.bookstore.entity.user.User;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public interface OrdersService {
    List<OrdersDTO> findAllOrdersByUser(Integer idUser);
    List<OrdersDTO> findAllOrdersByCurrentUser();
    OrdersDTO findById(Integer idOder);
    OrdersDTO create(OrdersCreateDTO ordersCreateDTO);
    OrdersDTO update(Integer id,String status);
    Page<OrdersDTO> getStatus(Pageable pageable,String status);
}
