package com.web.bookstore.service.cart;

import com.web.bookstore.dto.cartDTO.cartDTO.CartCreateDTO;
import com.web.bookstore.dto.cartDTO.cartDTO.CartDTO;
import com.web.bookstore.dto.cartDTO.cartDTO.CartUpdateDTO;
import com.web.bookstore.entity.user.User;
import org.springframework.stereotype.Service;

@Service
public interface CartService {
    CartDTO findById(Integer id);
    CartDTO findByUser(Integer idUser);
    CartDTO createCart(CartCreateDTO cartCreateDTO);
    CartDTO updateCart(CartUpdateDTO cartUpdateDTO);
    boolean checkExistCart(Integer id);
}