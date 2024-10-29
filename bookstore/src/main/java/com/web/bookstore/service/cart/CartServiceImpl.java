package com.web.bookstore.service.cart;

import com.web.bookstore.dto.cartDTO.cartDTO.CartCreateDTO;
import com.web.bookstore.dto.cartDTO.cartDTO.CartDTO;
import com.web.bookstore.dto.cartDTO.cartDTO.CartUpdateDTO;
import com.web.bookstore.entity.cart.Cart;
import com.web.bookstore.entity.cart.CartDetail;
import com.web.bookstore.entity.user.User;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.CartMapper;
import com.web.bookstore.repository.cart.CartDetailRepository;
import com.web.bookstore.repository.cart.CartRepository;
import com.web.bookstore.repository.user.UserRepository;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;

@Service
@Slf4j
public class CartServiceImpl implements CartService{
    @Autowired
    private CartRepository cartRepository;

    @Autowired
    private CartMapper cartMapper;

    @Autowired
    private UserRepository userRepository;
    @Autowired
    private CartDetailRepository cartDetailRepository;

    @Override
    public CartDTO findById(Integer id) {
        log.info("Getting cart by id: {}", id);
       Cart cart= cartRepository.findById(id)
                .orElseThrow(() -> new CustomException(Error.CART_NOT_FOUND));
        List<CartDetail >cartDetails=cartDetailRepository.findByCart(cart);

        return cartMapper.convertCartToCartDTO(cart,cartDetails);
    }

    @Override
    public CartDTO findByUser() {
        User user=new User();

        Cart cart=cartRepository.findCartByIdUser(user.getId());
        List<CartDetail >cartDetails=cartDetailRepository.findByCart(cart);
        return cartMapper.convertCartToCartDTO(cart,cartDetails);
    }

    @Override
    public CartDTO createCart(CartCreateDTO cartCreateDTO) {
        log.info("Creating new cart for user: {}", cartCreateDTO.toString());

        User user = new User();

        Cart cart = cartMapper.convertCartCreateDTOToCart(cartCreateDTO);
        cart.setUser(user);
        List<CartDetail> cartDetails=new ArrayList<>();
        return cartMapper.convertCartToCartDTO(cartRepository.save(cart),cartDetails);
    }

    @Override
    public CartDTO updateCart() {
     User user=new User();
     Cart cart=cartRepository.findCartByIdUser(user.getId());
        List<CartDetail >cartDetails=cartDetailRepository.findByCart(cart);
        Integer quantity=cartDetails.stream().mapToInt(CartDetail::getQuantity).sum();
        Double total=cartDetails.stream()
                .mapToDouble(cartDetail->cartDetail.getQuantity()*cartDetail.getProduct().getPrice())
                .sum();
        cart.setQuantity(quantity);
        cart.setPrice(total);
        return cartMapper.convertCartToCartDTO(cartRepository.save(cart),cartDetails);
    }

    @Override
    public boolean checkExistCart(Integer id) {
        log.info("Checking if cart exists with id: {}", id);
        return cartRepository.existsById(id);
    }
}
