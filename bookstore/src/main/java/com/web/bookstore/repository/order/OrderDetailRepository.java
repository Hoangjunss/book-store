package com.web.bookstore.repository.order;

import com.web.bookstore.entity.order.OrderDetail;
import com.web.bookstore.entity.order.Orders;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface OrderDetailRepository extends JpaRepository<OrderDetail,Integer> {
    List<OrderDetail> findAllByOrders(Orders orders);
}
