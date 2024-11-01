package com.web.bookstore.service.orders;

import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailDTO;
import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersCreateDTO;
import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersDTO;
import com.web.bookstore.entity.order.OrderStatus;
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
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.stream.Collectors;

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
    @Autowired
    private OrderDetailsService orderDetailsService;



    @Override
    public List<OrdersDTO> findAllOrdersByUser(Integer idUser) {
        log.info("Find All orders by user id: {} " , idUser);

        User user = userRepository.findById(idUser)
                .orElseThrow(()-> new CustomException(Error.USER_NOT_FOUND));

        List<Orders> orders = orderRepository.findAllByUser(user);
        List<OrdersDTO> ordersDTOS=orders.stream().map(orders1 -> {
            List<OrderDetailDTO>orderDetailDTOS=orderDetailsService.findAllByOrder(orders1.getId());
            return ordersMapper.convertOrdersToOrdersDTO(orders1,orderDetailDTOS);
        }).collect(Collectors.toList());

        return ordersDTOS;
    }

    @Override
    public OrdersDTO findById(Integer idOder) {
        log.info("Find Order by id: {} " , idOder);

        Orders orders = orderRepository.findById(idOder)
                .orElseThrow(()-> new CustomException(Error.ORDERS_NOT_FOUND));
        List<OrderDetailDTO>orderDetailDTOS=orderDetailsService.findAllByOrder(idOder);

        return ordersMapper.convertOrdersToOrdersDTO(orders,orderDetailDTOS);
    }

    @Override
    public OrdersDTO create(OrdersCreateDTO ordersCreateDTO) {
        log.info("Create Order: {} " , ordersCreateDTO.toString());

        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
        User user = (User) authentication.getPrincipal();

        Address address = addressRepository.findById(ordersCreateDTO.getAddress().getId())
                .orElseThrow(()-> new CustomException(Error.ADDRESS_NOT_FOUND));

        Orders orders = ordersMapper.convertOrdersCreateDTOToOrders(ordersCreateDTO);
        orders.setUser(user);
        orders.setAddress(address);
        List<OrderDetailDTO> orderDetailDTOS=ordersCreateDTO.getOrderDetailCreateDTOS().stream().map(orderDetailCreateDTO -> orderDetailsService.create(orderDetailCreateDTO)).collect(Collectors.toList());
        return ordersMapper.convertOrdersToOrdersDTO(orderRepository.save(orders),orderDetailDTOS);
    }

    @Override
    public OrdersDTO update(Integer id, String status) {
        Orders orders=orderRepository.findById(id).orElseThrow();
        orders.setOrderStatus(OrderStatus.valueOf(status));
        Orders ordersSave=orderRepository.save(orders);
        List<OrderDetailDTO> orderDetailDTOS=orderDetailsService.findAllByOrder(ordersSave.getId());
        return ordersMapper.convertOrdersToOrdersDTO(ordersSave,orderDetailDTOS);
    }

    @Override
    public Page<OrdersDTO> getStatus(Pageable pageable, String status) {
        // Chuyển đổi chuỗi thành OrderStatus
        OrderStatus orderStatus = OrderStatus.valueOf(status.toUpperCase());

        // Lấy danh sách Orders theo trạng thái và phân trang
        Page<Orders> ordersPage = orderRepository.findByOrderStatus(orderStatus, pageable);

        // Chuyển đổi mỗi Orders thành OrdersDTO và bao gồm danh sách OrderDetailDTO
        return ordersPage.map(order -> {
            // Lấy danh sách OrderDetailDTO cho từng đơn hàng
            List<OrderDetailDTO> orderDetailDTOS = orderDetailsService.findAllByOrder(order.getId());

            // Chuyển đổi Orders sang OrdersDTO, và set OrderDetailDTOS
            return ordersMapper.convertOrdersToOrdersDTO(order, orderDetailDTOS);
        });
    }

}
