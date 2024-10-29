package com.web.bookstore.mapper;

import com.web.bookstore.dto.cartDTO.cartDTO.CartCreateDTO;
import com.web.bookstore.dto.cartDTO.cartDTO.CartDTO;
import com.web.bookstore.dto.cartDTO.cartDTO.CartUpdateDTO;
import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailDTO;
import com.web.bookstore.entity.cart.Cart;
import com.web.bookstore.entity.cart.CartDetail;
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
    @Autowired
    private CartDetailMapper cartDetailMapper;

    public Cart convertCartCreateDTOToCart(CartCreateDTO cartCreateDTO) {
        Cart cart = modelMapper.map(cartCreateDTO, Cart.class);

        return cart;
    }

    public Cart convertCartUpdateDTOToCart(CartUpdateDTO cartUpdateDTO) {
        Cart cart = modelMapper.map(cartUpdateDTO, Cart.class);

        return cart;
    }

    public CartDTO convertCartToCartDTO(Cart cart , List<CartDetail> cartDetail) {
        CartDTO cartDTO=modelMapper.map(cart, CartDTO.class);
        List<CartDetailDTO> cartDetailDTOS=cartDetail.stream().map(cartDetail1 -> cartDetailMapper.convertCartDetailToCartDetailDTO(cartDetail1)).collect(Collectors.toList());
        cartDTO.setCartDetailDTOList(cartDetailDTOS);
        return cartDTO;
    }


}
