package com.web.bookstore.service.orders;

import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailDTO;

import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersCreateDTO;
import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersDTO;
import com.web.bookstore.entity.cart.Cart;
import com.web.bookstore.entity.cart.CartDetail;
import com.web.bookstore.entity.order.OrderStatus;

import com.web.bookstore.entity.order.Orders;
import com.web.bookstore.entity.other.Address;
import com.web.bookstore.entity.other.Payment;
import com.web.bookstore.entity.user.User;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.AddressMapper;
import com.web.bookstore.mapper.OrdersMapper;
import com.web.bookstore.repository.cart.CartDetailRepository;
import com.web.bookstore.repository.cart.CartRepository;
import com.web.bookstore.repository.order.OrderRepository;
import com.web.bookstore.repository.other.AddressRepository;
import com.web.bookstore.repository.user.UserRepository;
import com.web.bookstore.service.cart.CartDetailService;
import com.web.bookstore.service.cart.CartService;
import com.web.bookstore.service.other.AddressService;
import jakarta.persistence.Id;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Service;

import java.math.BigDecimal;
import java.time.LocalDateTime;
import java.util.List;
import java.util.UUID;
import java.util.stream.Collectors;

@Service
@Slf4j
public class OrdersServiceImpl implements OrdersService{
    @Autowired
    private OrdersMapper ordersMapper;
    @Autowired
    private CartDetailRepository cartDetailRepository;
    @Autowired
    private CartRepository cartRepository;

    @Autowired
    private OrderRepository orderRepository;

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private AddressRepository addressRepository;
    @Autowired
    private OrderDetailsService orderDetailsService;
    @Autowired
    private AddressService addressService;
    @Autowired
    private AddressMapper addressMapper;
    @Autowired
    private CartService cartService;
    @Autowired
    private CartDetailService cartDetailService;



    @Override
    public List<OrdersDTO> findAllOrdersByUser() {


        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
        User user = (User) authentication.getPrincipal();

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
        log.info("Create Order: {} ", ordersCreateDTO.toString());

        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();
        User user = (User) authentication.getPrincipal();
        Cart cart = cartRepository.findCartByUser(user);
        List<CartDetail> cartDetails = cartDetailRepository.findByCart(cart);
        Integer quantity = cartDetails.stream()
                .mapToInt(cartDetail -> cartDetail.getQuantity()) // Lấy số lượng từ từng chi tiết giỏ hàng
                .sum();
        BigDecimal totalPrice = cartDetails.stream()
                .map(cartDetail -> BigDecimal.valueOf(cartDetail.getProductSale().getPrice()).multiply(BigDecimal.valueOf(cartDetail.getQuantity()))) // Tính tổng giá của từng chi tiết giỏ hàng
                .reduce(BigDecimal.ZERO, BigDecimal::add);

        Orders orders = new Orders();
        Address address = addressMapper.convertAddressDTOToAddress(addressService.createAddress(ordersCreateDTO.getAddress()));
        orders.setUser(user);
        orders.setQuantity(quantity);
        orders.setTotalPrice(totalPrice);
        orders.setAddress(address);
        orders.setId(getGenerationId());
        orders.setOrderStatus(OrderStatus.valueOf(ordersCreateDTO.getOrderStatus()));
        orders.setPaymentStatus(Payment.valueOf(ordersCreateDTO.getPaymentStatus()));
        orders.setDate(LocalDateTime.now());
        Orders ordersSave = orderRepository.save(orders);
        List<OrderDetailDTO> orderDetailDTOS = orderDetailsService.createByCartDetail(ordersSave, cartDetails);
        cartService.deleteCart(cart);
        cartDetailService.deleteListCartDetail(cartDetails);
        return ordersMapper.convertOrdersToOrdersDTO(orderRepository.save(orders), orderDetailDTOS);
    }
    @Override
    public OrdersDTO update(Integer id, String status) {
        Orders orders=orderRepository.findById(id).orElseThrow();
        orders.setOrderStatus(OrderStatus.valueOf(status));
        orders.setDate(LocalDateTime.now());
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
    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }

}
