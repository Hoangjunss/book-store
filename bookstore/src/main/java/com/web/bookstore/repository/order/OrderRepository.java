package com.web.bookstore.repository.order;

import com.web.bookstore.entity.order.Orders;
import org.springframework.data.jpa.repository.JpaRepository;

public interface OrderRepository extends JpaRepository<Orders,Integer> {
}
