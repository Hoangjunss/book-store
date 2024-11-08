package com.web.bookstore.dto.cartDTO.cartdetailDTO;

import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;

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
    private ProductDTO product;
}