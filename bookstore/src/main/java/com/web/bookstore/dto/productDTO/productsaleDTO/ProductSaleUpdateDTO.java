package com.web.bookstore.dto.productDTO.productsaleDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class ProductSaleUpdateDTO {
    private Integer id;
    private Integer productId;
    private Integer quantity;
    private Boolean status;
}
