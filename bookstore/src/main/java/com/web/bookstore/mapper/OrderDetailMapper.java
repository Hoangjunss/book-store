package com.web.bookstore.mapper;

import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailCreateDTO;
import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailDTO;
import com.web.bookstore.dto.orderDTO.orderdetailDTO.OrderDetailUpdateDTO;
import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;
import com.web.bookstore.entity.order.OrderDetail;
import com.web.bookstore.entity.order.Orders;
import com.web.bookstore.entity.product.Product;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;

@Component
public class OrderDetailMapper {

    @Autowired
    private ModelMapper modelMapper;
    @Autowired
    private ProductMapper productMapper;

    public OrderDetail convertOrderDetailCreateDTOToOrderDetail(OrderDetailCreateDTO orderDetailCreateDTO, Orders orders, Product product) {
        OrderDetail orderDetail = modelMapper.map(orderDetailCreateDTO, OrderDetail.class);
        orderDetail.setOrders(orders);
        orderDetail.setProduct(product);
        return orderDetail;
    }

    public OrderDetail convertOrderDetailUpdateDTOToOrderDetail(OrderDetailUpdateDTO orderDetailUpdateDTO, Orders orders, Product product) {
        OrderDetail orderDetail = modelMapper.map(orderDetailUpdateDTO, OrderDetail.class);
        orderDetail.setOrders(orders);
        orderDetail.setProduct(product);
        return orderDetail;
    }

    public OrderDetailDTO convertOrderDetailToOrderDetailDTO(OrderDetail orderDetail) {
        OrderDetailDTO orderDetailDTO= modelMapper.map(orderDetail, OrderDetailDTO.class);
        ProductDTO productDTO=productMapper.conventProductToProductDTO(orderDetail.getProduct());
        orderDetailDTO.setProduct(productDTO);
        return orderDetailDTO;
    }

    public List<OrderDetailDTO> convertOrderDetailListToOrderDetailDTOList(List<OrderDetail> orderDetails) {
        return orderDetails.stream()
                .map(this::convertOrderDetailToOrderDetailDTO)
                .collect(Collectors.toList());
    }
}
