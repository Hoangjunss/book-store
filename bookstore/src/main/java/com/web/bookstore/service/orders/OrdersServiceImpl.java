package com.web.bookstore.service.orders;

import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersCreateDTO;
import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersDTO;
import com.web.bookstore.entity.order.Orders;
import com.web.bookstore.entity.other.Address;
import com.web.bookstore.entity.user.User;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.OrdersMapper;
import com.web.bookstore.repository.order.OrderRepository;
import com.web.bookstore.repository.other.AddressRepository;
import com.web.bookstore.repository.user.UserRepository;
import jakarta.persistence.Id;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
@Slf4j
public class OrdersServiceImpl implements OrdersService{
    @Autowired
    private OrdersMapper ordersMapper;

    @Autowired
    private OrderRepository orderRepository;

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private AddressRepository addressRepository;


    @Override
    public List<OrdersDTO> findAllOrdersByUser(Integer idUser) {
        log.info("Find All orders by user id: {} " , idUser);

        User user = userRepository.findById(idUser)
                .orElseThrow(()-> new CustomException(Error.USER_NOT_FOUND));

        List<Orders> orders = orderRepository.findAllByUser(user);

        return ordersMapper.convertOrdersListToOrdersDTOList(orders);
    }

    @Override
    public OrdersDTO findById(Integer idOder) {
        log.info("Find Order by id: {} " , idOder);

        Orders orders = orderRepository.findById(idOder)
                .orElseThrow(()-> new CustomException(Error.ORDERS_NOT_FOUND));

        return ordersMapper.convertOrdersToOrdersDTO(orders);
    }

    @Override
    public OrdersDTO create(OrdersCreateDTO ordersCreateDTO) {
        log.info("Create Order: {} " , ordersCreateDTO.toString());

        User user = userRepository.findById(ordersCreateDTO.getUserId())
                .orElseThrow(()-> new CustomException(Error.USER_NOT_FOUND));

        Address address = addressRepository.findById(ordersCreateDTO.getAddressId())
                .orElseThrow(()-> new CustomException(Error.ADDRESS_NOT_FOUND));

        Orders orders = ordersMapper.convertOrdersCreateDTOToOrders(ordersCreateDTO, user, address);

        return ordersMapper.convertOrdersToOrdersDTO(orderRepository.save(orders));
    }
}
