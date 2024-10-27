package com.web.bookstore.service.cart;

import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailCreateDTO;
import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailDTO;
import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailUpdateDTO;
import com.web.bookstore.entity.cart.Cart;
import com.web.bookstore.entity.cart.CartDetail;
import com.web.bookstore.entity.product.ProductSale;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.CartDetailMapper;
import com.web.bookstore.repository.cart.CartDetailRepository;
import com.web.bookstore.repository.cart.CartRepository;
import com.web.bookstore.repository.product.ProductSaleRepository;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
@Slf4j
public class CartDetailServiceImpl implements CartDetailService{
    @Autowired
    private CartDetailMapper cartDetailMapper;

    @Autowired
    private CartRepository cartRepository;

    @Autowired
    private CartDetailRepository cartDetailRepository;

    @Autowired
    private ProductSaleRepository productSaleRepository;

    @Override
    public List<CartDetailDTO> findAllCartDetailDTOsByCart(Integer idCart) {
        log.info("Find cart detail by id cart: {}", idCart);

        Cart cart = cartRepository.findById(idCart)
                .orElseThrow(() -> new CustomException(Error.CART_NOT_FOUND));

        List<CartDetail> cartDetails = cartDetailRepository.findByCart(cart);
        return cartDetailMapper.convertCartDetailListToCartDetailDTOList(cartDetails);
    }

    @Override
    public CartDetailDTO createCartDetail(CartDetailCreateDTO cartDetailCreateDTO) {
        log.info("Create cart detail: {}", cartDetailCreateDTO.toString());

        ProductSale productSale = productSaleRepository.findById(cartDetailCreateDTO.getProductSaleId())
                .orElseThrow(()-> new CustomException(Error.PRODUCTSALE_NOT_FOUND));

        Cart cart = cartRepository.findById(cartDetailCreateDTO.getCartId())
                .orElseThrow(()-> new CustomException(Error.CART_NOT_FOUND));

        if(cartDetailCreateDTO.getQuantity() > productSale.getQuantity()){
            throw new CustomException(Error.CARTDETAIL_INVALID_QUANTITY);
        }

        CartDetail cartDetail = cartDetailMapper.convertCartDetailCreateDTOToCartDetail(cartDetailCreateDTO, productSale, cart);
        return cartDetailMapper.convertCartDetailToCartDetailDTO(cartDetailRepository.save(cartDetail));
    }

    @Override
    public CartDetailDTO findCartDetailById(Integer id) {
        log.info("Find cart detail by id: {}", id);

        return cartDetailMapper.convertCartDetailToCartDetailDTO(
                cartDetailRepository.findById(id)
                       .orElseThrow(() -> new CustomException(Error.CARTDETAIL_NOT_FOUND))
        );
    }

    @Override
    public boolean checkExist(Integer idCartDetail) {
        return cartDetailRepository.existsById(idCartDetail);
    }

    @Override
    public CartDetailDTO updateCartDetail(CartDetailUpdateDTO cartDetailUpdateDTO) {
        log.info("Update cart detail: {}", cartDetailUpdateDTO.toString());

        Cart cart = cartRepository.findById(cartDetailUpdateDTO.getCartId())
                .orElseThrow(()-> new CustomException(Error.CART_NOT_FOUND));

        ProductSale productSale = productSaleRepository.findById(cartDetailUpdateDTO.getProductSaleId())
                .orElseThrow(()-> new CustomException(Error.PRODUCTSALE_NOT_FOUND));

        if(cartDetailUpdateDTO.getQuantity() > productSale.getQuantity() || cartDetailUpdateDTO.getQuantity() < 0){
            throw new CustomException(Error.CARTDETAIL_INVALID_QUANTITY);
        }

        CartDetail cartDetail = cartDetailMapper.convertCartDetailUpdateDTOToCartDetail(cartDetailUpdateDTO, productSale, cart);
        return cartDetailMapper.convertCartDetailToCartDetailDTO(cartDetailRepository.save(cartDetail));
    }

    @Override
    public void deleteCartDetail(Integer id) {
        log.info("Delete cart detail by id: {}", id);

        cartDetailRepository.findById(id)
                .ifPresentOrElse(
                        cartDetail -> cartDetailRepository.delete(cartDetail),
                        () -> { throw new CustomException(Error.CARTDETAIL_NOT_FOUND); }
                );
    }
}
