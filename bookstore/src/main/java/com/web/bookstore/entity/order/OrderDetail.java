package com.web.bookstore.entity.order;

import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.product.ProductSale;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class OrderDetail {
    @Id
    private Integer id;
    @ManyToOne
    @JoinColumn
    private Orders orders;
    @ManyToOne
    @JoinColumn
    private ProductSale productSale;
    private Integer quantity;
    private BigDecimal unitPrice;
    private BigDecimal totalPrice;
}
