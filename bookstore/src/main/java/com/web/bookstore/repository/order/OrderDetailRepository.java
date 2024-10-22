package com.web.bookstore.repository.order;

import com.web.bookstore.entity.order.OrderDetail;
import org.springframework.data.jpa.repository.JpaRepository;

public interface OrderDetailRepository extends JpaRepository<OrderDetail,Integer> {
}
