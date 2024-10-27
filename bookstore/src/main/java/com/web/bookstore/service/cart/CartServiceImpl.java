package com.web.bookstore.service.cart;

import com.web.bookstore.dto.cartDTO.cartDTO.CartCreateDTO;
import com.web.bookstore.dto.cartDTO.cartDTO.CartDTO;
import com.web.bookstore.dto.cartDTO.cartDTO.CartUpdateDTO;
import com.web.bookstore.entity.cart.Cart;
import com.web.bookstore.entity.user.User;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.CartMapper;
import com.web.bookstore.repository.cart.CartRepository;
import com.web.bookstore.repository.user.UserRepository;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
@Slf4j
public class CartServiceImpl implements CartService{
    @Autowired
    private CartRepository cartRepository;

    @Autowired
    private CartMapper cartMapper;

    @Autowired
    private UserRepository userRepository;

    @Override
    public CartDTO findById(Integer id) {
        log.info("Getting cart by id: {}", id);

        return cartMapper.convertCartToCartDTO(cartRepository.findById(id)
                .orElseThrow(() -> new CustomException(Error.CART_NOT_FOUND)));
    }

    @Override
    public CartDTO findByUser(Integer idUser) {
        log.info("Getting cart by user id: {}", idUser);

        return cartMapper.convertCartToCartDTO(cartRepository.findCartByIdUser(idUser));
    }

    @Override
    public CartDTO createCart(CartCreateDTO cartCreateDTO) {
        log.info("Creating new cart for user: {}", cartCreateDTO.toString());

        User user = new User();

        Cart cart = cartMapper.convertCartCreateDTOToCart(cartCreateDTO, user);
        return cartMapper.convertCartToCartDTO(cartRepository.save(cart));
    }

    @Override
    public CartDTO updateCart(CartUpdateDTO cartUpdateDTO) {
        log.info("Updating cart with id: {}", cartUpdateDTO.toString());

        User user = new User();

        Cart cart = cartMapper.convertCartUpdateDTOToCart(cartUpdateDTO, user);
        return cartMapper.convertCartToCartDTO(cartRepository.save(cart));
    }

    @Override
    public boolean checkExistCart(Integer id) {
        log.info("Checking if cart exists with id: {}", id);
        return cartRepository.existsById(id);
    }
}
