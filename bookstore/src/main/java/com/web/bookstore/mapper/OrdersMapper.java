package com.web.bookstore.mapper;

import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersCreateDTO;
import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersDTO;
import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersUpdateDTO;
import com.web.bookstore.entity.order.Orders;
import com.web.bookstore.entity.other.Address;
import com.web.bookstore.entity.user.User;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;

@Component
public class OrdersMapper {

    @Autowired
    private ModelMapper modelMapper;

    public Orders convertOrdersCreateDTOToOrders(OrdersCreateDTO ordersCreateDTO, User user, Address address) {
        Orders orders = modelMapper.map(ordersCreateDTO, Orders.class);
        orders.setUser(user);
        orders.setAddress(address);
        return orders;
    }

    public Orders convertOrdersUpdateDTOToOrders(OrdersUpdateDTO ordersUpdateDTO, User user, Address address) {
        Orders orders = modelMapper.map(ordersUpdateDTO, Orders.class);
        orders.setUser(user);
        orders.setAddress(address);
        return orders;
    }

    public OrdersDTO convertOrdersToOrdersDTO(Orders orders) {
        return modelMapper.map(orders, OrdersDTO.class);
    }

    public List<OrdersDTO> convertOrdersListToOrdersDTOList(List<Orders> ordersList) {
        return ordersList.stream()
                .map(this::convertOrdersToOrdersDTO)
                .collect(Collectors.toList());
    }
}
