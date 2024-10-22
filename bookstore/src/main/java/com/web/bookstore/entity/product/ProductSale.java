package com.web.bookstore.entity.product;

import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class ProductSale {
    @Id
    private Integer id;
    @OneToOne
    @JoinColumn
    private Product product;
    private Integer quantity;
    private Boolean status;
}
