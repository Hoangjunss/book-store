package com.web.bookstore.mapper;

import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailDTO;
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

    public Orders convertOrdersCreateDTOToOrders(OrdersCreateDTO ordersCreateDTO) {
        Orders orders = modelMapper.map(ordersCreateDTO, Orders.class);

        return orders;
    }

    public Orders convertOrdersUpdateDTOToOrders(OrdersUpdateDTO ordersUpdateDTO) {
        Orders orders = modelMapper.map(ordersUpdateDTO, Orders.class);
        return orders;
    }

    public OrdersDTO convertOrdersToOrdersDTO(Orders orders, List<OrderDetailDTO> orderDetailDTOS) {
       OrdersDTO ordersDTO=modelMapper.map(orders, OrdersDTO.class);
       ordersDTO.setOrderDetailDTOS(orderDetailDTOS);
       ordersDTO.setUsername(orders.getUser().getUsername());
       ordersDTO.setOrderStatus(orders.getOrderStatus().name());
       ordersDTO.setPaymentStatus(orders.getPaymentStatus().name());
       return ordersDTO;
    }


}
