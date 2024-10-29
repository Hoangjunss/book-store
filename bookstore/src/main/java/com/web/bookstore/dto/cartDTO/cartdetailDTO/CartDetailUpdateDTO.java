package com.web.bookstore.dto.cartDTO.cartdetailDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class CartDetailUpdateDTO {
    private Integer id;
    private Integer quantity;
    private Integer productSaleId;

}
