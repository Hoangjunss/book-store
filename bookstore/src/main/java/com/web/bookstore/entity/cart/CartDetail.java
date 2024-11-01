package com.web.bookstore.entity.cart;

import com.web.bookstore.entity.product.ProductSale;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class CartDetail {
    @Id
    private Integer id;
    private Integer quantity;
    @ManyToOne
    @JoinColumn
    private ProductSale productSale;
    @ManyToOne
    @JoinColumn
    private Cart cart;

}
