package com.web.bookstore.dto.productDTO.productsaleDTO;

import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;
import com.web.bookstore.entity.product.Product;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class ProductSaleDTO {
    private Integer id;
    private Product product;
    private Integer quantity;
    private Boolean status;
    private Double price;
}
