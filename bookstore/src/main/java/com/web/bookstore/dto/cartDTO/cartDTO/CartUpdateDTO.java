package com.web.bookstore.dto.cartDTO.cartDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class CartUpdateDTO {
    private Integer id;
    private Integer userId;
    private Integer quantity;
}
