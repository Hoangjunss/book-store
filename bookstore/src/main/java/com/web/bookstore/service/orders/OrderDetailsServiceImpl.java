package com.web.bookstore.service.orders;

import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailCreateDTO;
import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailDTO;
import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailUpdateDTO;
import com.web.bookstore.entity.cart.CartDetail;
import com.web.bookstore.entity.order.OrderDetail;
import com.web.bookstore.entity.order.Orders;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.product.ProductSale;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.OrderDetailMapper;
import com.web.bookstore.repository.order.OrderDetailRepository;
import com.web.bookstore.repository.order.OrderRepository;
import com.web.bookstore.repository.product.ProductRepository;
import com.web.bookstore.repository.product.ProductSaleRepository;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.math.BigDecimal;
import java.util.List;
import java.util.UUID;
import java.util.stream.Collectors;

@Service
@Slf4j
public class OrderDetailsServiceImpl implements OrderDetailsService{
    @Autowired
    private OrderDetailMapper orderDetailsMapper;

    @Autowired
    private OrderDetailRepository orderDetailsRepository;

    @Autowired
    private OrderRepository orderRepository;

    @Autowired
    private ProductRepository productRepository;

    @Autowired
    private ProductSaleRepository productSaleRepository;
    @Override
    public List<OrderDetailDTO> createByCartDetail(Orders order, List<CartDetail> cartDetails) {
        List<OrderDetail> orderDetails=cartDetails.stream().map(cartDetail -> {
            OrderDetail orderDetail=OrderDetail.builder()
                    .id(getGenerationId())
                    .orders(order)
                    .product(cartDetail.getProductSale().getProduct())
                    .quantity(cartDetail.getQuantity())
                    .unitPrice(BigDecimal.valueOf(cartDetail.getProductSale().getPrice()))
                    .totalPrice(BigDecimal.valueOf(cartDetail.getProductSale().getPrice()).multiply(BigDecimal.valueOf(cartDetail.getQuantity())))
                    .build();
            return orderDetailsRepository.save(orderDetail);
        }).collect(Collectors.toList());
        return orderDetailsMapper.convertOrderDetailListToOrderDetailDTOList(orderDetails);
    }


    @Override
    public List<OrderDetailDTO> findAllByOrder(Integer idOrder) {
        log.info("Find all order details for order: {} ", idOrder );

        Orders order = orderRepository.findById(idOrder)
                .orElseThrow(()-> new CustomException(Error.ORDERS_NOT_FOUND));

        List<OrderDetail> orderDetailDTOList = orderDetailsRepository.findAllByOrders(order);

        return orderDetailsMapper.convertOrderDetailListToOrderDetailDTOList(orderDetailDTOList);
    }

    @Override
    public OrderDetailDTO findById(Integer idOrderDetail) {
        return orderDetailsMapper.convertOrderDetailToOrderDetailDTO(
                orderDetailsRepository.findById(idOrderDetail)
                       .orElseThrow(()-> new CustomException(Error.ORDERDETAIL_NOT_FOUND))
        );
    }

    @Override
    public OrderDetailDTO create(OrderDetailCreateDTO orderDetailCreateDTO) {
        log.info("Create OrderDetail with data: {}", orderDetailCreateDTO);

        Orders order = orderRepository.findById(orderDetailCreateDTO.getOrdersId())
                .orElseThrow(() -> new CustomException(Error.ORDERS_NOT_FOUND));

        Product product = productRepository.findById(orderDetailCreateDTO.getProductId())
                .orElseThrow(() -> new CustomException(Error.PRODUCT_NOT_FOUND));

        ProductSale productSale = productSaleRepository.findByProduct(product);

        if (orderDetailCreateDTO.getQuantity() <= 0 ) {
            throw new CustomException(Error.ORDERDETAIL_INVALID_QUANTITY);
        }

        if(orderDetailCreateDTO.getQuantity() > productSale.getQuantity()){
            throw new CustomException(Error.ORDERDETAIL_INVALID_PRODUCTSALE);
        }

        BigDecimal totalPrice;
        if (orderDetailCreateDTO.getTotalPrice() != null) {
            totalPrice = orderDetailCreateDTO.getTotalPrice();
        } else {
            totalPrice = orderDetailCreateDTO.getUnitPrice().multiply(BigDecimal.valueOf(orderDetailCreateDTO.getQuantity()));
        }

        OrderDetail orderDetail = orderDetailsMapper.convertOrderDetailCreateDTOToOrderDetail(orderDetailCreateDTO, order, product);
        orderDetail.setTotalPrice(totalPrice);
        orderDetail.setId(getGenerationId());

        OrderDetail savedOrderDetail = orderDetailsRepository.save(orderDetail);
        log.info("OrderDetail created with ID: {}", savedOrderDetail.getId());
        orderRepository.updateTotalPriceByOrderId(orderDetail.getOrders().getId());
        return orderDetailsMapper.convertOrderDetailToOrderDetailDTO(savedOrderDetail);
    }

    @Override
    public OrderDetailDTO update(OrderDetailUpdateDTO orderDetailUpdateDTO) {
        log.info("Update OrderDetail with data: {}", orderDetailUpdateDTO);

        Orders order = orderRepository.findById(orderDetailUpdateDTO.getOrdersId())
                .orElseThrow(() -> new CustomException(Error.ORDERS_NOT_FOUND));

        OrderDetail orderDetail = orderDetailsRepository.findById(orderDetailUpdateDTO.getId())
                .orElseThrow(()-> new CustomException(Error.ORDERDETAIL_NOT_FOUND));

        Product product = productRepository.findById(orderDetailUpdateDTO.getProductId())
                .orElseThrow(() -> new CustomException(Error.PRODUCT_NOT_FOUND));

        ProductSale productSale = productSaleRepository.findByProduct(product);

        if (orderDetailUpdateDTO.getQuantity() <= 0 ) {
            throw new CustomException(Error.ORDERDETAIL_INVALID_QUANTITY);
        }

        if(orderDetailUpdateDTO.getQuantity() > productSale.getQuantity()){
            throw new CustomException(Error.ORDERDETAIL_INVALID_PRODUCTSALE);
        }

        BigDecimal totalPrice;
        if (orderDetailUpdateDTO.getTotalPrice() != null) {
            totalPrice = orderDetailUpdateDTO.getTotalPrice();
        } else {
            totalPrice = orderDetailUpdateDTO.getUnitPrice().multiply(BigDecimal.valueOf(orderDetailUpdateDTO.getQuantity()));
        }

        OrderDetail orderDetail1 = orderDetailsMapper.convertOrderDetailUpdateDTOToOrderDetail(orderDetailUpdateDTO, order, product);
        orderDetail.setTotalPrice(totalPrice);

        OrderDetail savedOrderDetail = orderDetailsRepository.save(orderDetail1);
        log.info("OrderDetail updated with ID: {}", savedOrderDetail.getId());
        orderRepository.updateTotalPriceByOrderId(orderDetail.getOrders().getId());
        return orderDetailsMapper.convertOrderDetailToOrderDetailDTO(savedOrderDetail);
    }
    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
