package com.web.bookstore.dto.cartDTO.cartDTO;

import com.web.bookstore.dto.cartDTO.cartdetailDTO.CartDetailDTO;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.util.List;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class CartUpdateDTO {
    private Integer id;
    private Integer userId;
    private Integer quantity;
    private List<CartDetailDTO> cartDetailDTOList;
}
