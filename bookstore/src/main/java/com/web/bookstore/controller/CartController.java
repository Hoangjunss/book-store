package com.web.bookstore.controller;

import com.web.bookstore.dto.cartDTO.cartDTO.CartDTO;
import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailCreateDTO;
import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailDTO;
import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailUpdateDTO;
import com.web.bookstore.service.cart.CartDetailService;
import com.web.bookstore.service.cart.CartService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/cart-details")
public class CartController {

    @Autowired
    private CartDetailService cartDetailService;
    @Autowired
    private CartService cartService;

    // Retrieve all CartDetails by Cart ID
    @GetMapping()
    public ResponseEntity<CartDTO> findAllCartDetailDTOsByCart() {
       CartDTO cartDetails=cartService.findByUser();
        return ResponseEntity.ok(cartDetails);
    }

    // Create a new CartDetail
    @PostMapping
    public ResponseEntity<CartDetailDTO> createCartDetail(@RequestBody CartDetailCreateDTO cartDetailCreateDTO) {
        CartDetailDTO createdCartDetail = cartDetailService.createCartDetail(cartDetailCreateDTO);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdCartDetail);
    }

    // Find a CartDetail by ID


    // Update an existing CartDetail
    @PutMapping()
    public ResponseEntity<CartDetailDTO> updateCartDetail(

            @RequestBody CartDetailUpdateDTO cartDetailUpdateDTO) {

      // Set the ID in the DTO
        CartDetailDTO updatedCartDetail = cartDetailService.updateCartDetail(cartDetailUpdateDTO);
        return ResponseEntity.ok(updatedCartDetail);
    }

    // Delete a CartDetail by ID
    @DeleteMapping()
    public ResponseEntity<Void> deleteCartDetail(@RequestParam Integer id) {
        cartDetailService.deleteCartDetail(id);
        return ResponseEntity.noContent().build();
    }
}
