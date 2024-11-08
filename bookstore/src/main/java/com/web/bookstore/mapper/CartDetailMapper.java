package com.web.bookstore.mapper;

import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailCreateDTO;
import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailDTO;
import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailUpdateDTO;
import com.web.bookstore.entity.cart.CartDetail;
import com.web.bookstore.entity.cart.Cart;
import com.web.bookstore.entity.product.Product;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;

@Component
public class CartDetailMapper {

    @Autowired
    private ModelMapper modelMapper;

    public CartDetail convertCartDetailCreateDTOToCartDetail(CartDetailCreateDTO cartDetailCreateDTO, Product product, Cart cart) {
        CartDetail cartDetail = modelMapper.map(cartDetailCreateDTO, CartDetail.class);
        cartDetail.setProduct(product);
        cartDetail.setCart(cart);
        return cartDetail;
    }

    public CartDetail convertCartDetailUpdateDTOToCartDetail(CartDetailUpdateDTO cartDetailUpdateDTO, Product product, Cart cart) {
        CartDetail cartDetail = modelMapper.map(cartDetailUpdateDTO, CartDetail.class);
        cartDetail.setProduct(product);
        cartDetail.setCart(cart);
        return cartDetail;
    }

    public CartDetailDTO convertCartDetailToCartDetailDTO(CartDetail cartDetail) {
        return modelMapper.map(cartDetail, CartDetailDTO.class);
    }

    public List<CartDetailDTO> convertCartDetailListToCartDetailDTOList(List<CartDetail> cartDetails) {
        return cartDetails.stream()
                .map(this::convertCartDetailToCartDetailDTO)
                .collect(Collectors.toList());
    }
}
