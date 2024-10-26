package com.web.bookstore.mapper;

import com.web.bookstore.dto.cartDTO.cartDTO.CartCreateDTO;
import com.web.bookstore.dto.cartDTO.cartDTO.CartDTO;
import com.web.bookstore.dto.cartDTO.cartDTO.CartUpdateDTO;
import com.web.bookstore.entity.cart.Cart;
import com.web.bookstore.entity.user.User;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;

@Component
public class CartMapper {

    @Autowired
    private ModelMapper modelMapper;

    public Cart convertCartCreateDTOToCart(CartCreateDTO cartCreateDTO, User user) {
        Cart cart = modelMapper.map(cartCreateDTO, Cart.class);
        cart.setUser(user);
        return cart;
    }

    public Cart convertCartUpdateDTOToCart(CartUpdateDTO cartUpdateDTO, User user) {
        Cart cart = modelMapper.map(cartUpdateDTO, Cart.class);
        cart.setUser(user);
        return cart;
    }

    public CartDTO convertCartToCartDTO(Cart cart) {
        return modelMapper.map(cart, CartDTO.class);
    }

    public List<CartDTO> convertCartListToCartDTOList(List<Cart> carts) {
        return carts.stream()
                .map(this::convertCartToCartDTO)
                .collect(Collectors.toList());
    }
}
