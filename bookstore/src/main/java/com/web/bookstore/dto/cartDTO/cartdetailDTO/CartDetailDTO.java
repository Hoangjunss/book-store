package com.web.bookstore.dto.cartDTO.cartdetailDTO;

import com.web.bookstore.dto.productDTO.productsaleDTO.ProductSaleDTO;
import com.web.bookstore.entity.cart.Cart;
import com.web.bookstore.entity.product.ProductSale;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class CartDetailDTO {
    private Integer id;
    private Integer quantity;
    private ProductSaleDTO product;
}