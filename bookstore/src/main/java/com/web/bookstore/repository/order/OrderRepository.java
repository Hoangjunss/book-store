package com.web.bookstore.repository.order;

import com.web.bookstore.entity.order.OrderStatus;
import com.web.bookstore.entity.order.Orders;
import com.web.bookstore.entity.user.User;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;

public interface OrderRepository extends JpaRepository<Orders,Integer> {
    List<Orders> findAllByUser(User user);

    @Modifying
    @Transactional
    @Query("UPDATE Orders o SET o.totalPrice = (SELECT SUM(od.totalPrice) FROM OrderDetail od WHERE od.orders.id = :orderId) WHERE o.id = :orderId")
    void updateTotalPriceByOrderId(@Param("orderId") Integer orderId);
    Page<Orders> findByOrderStatus(OrderStatus orderStatus, Pageable pageable);
    List<Orders> findAllByStatus(OrderStatus orderStatus);
}
