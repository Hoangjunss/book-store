package com.web.bookstore.repository.cart;

import com.web.bookstore.entity.cart.Cart;
import com.web.bookstore.entity.cart.CartDetail;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface CartDetailRepository extends JpaRepository<CartDetail,Integer> {
    List<CartDetail> findByCart(Cart cart);
}
