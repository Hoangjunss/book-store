package com.web.bookstore.repository.cart;

import com.web.bookstore.entity.cart.CartDetail;
import org.springframework.data.jpa.repository.JpaRepository;

public interface CartDetailRepository extends JpaRepository<CartDetail,Integer> {
}
