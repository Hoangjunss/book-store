package com.web.bookstore.repository.cart;

import com.web.bookstore.entity.cart.Cart;
import com.web.bookstore.entity.user.User;
import org.springframework.data.jpa.repository.JpaRepository;

public interface CartRepository extends JpaRepository<Cart,Integer> {
    Cart findCartByIdUser(Integer idUser);
}
