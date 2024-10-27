package com.web.bookstore.service.cart;

import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailCreateDTO;
import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailDTO;
import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailUpdateDTO;
import com.web.bookstore.entity.cart.Cart;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public interface CartDetailService {
    List<CartDetailDTO> findAllCartDetailDTOsByCart(Integer idCart);
    CartDetailDTO createCartDetail(CartDetailCreateDTO cartDetailCreateDTO);
    CartDetailDTO findCartDetailById(Integer id);
    boolean checkExist(Integer idCartDetail);
    CartDetailDTO updateCartDetail(CartDetailUpdateDTO cartDetailUpdateDTO);
    void deleteCartDetail(Integer id);
}
