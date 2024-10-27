package com.web.bookstore.dto.cartDTO.cartDTO;

import com.web.bookstore.entity.user.User;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class CartDTO {
    private Integer id;
    private User user;
    private Integer quantity;
}
