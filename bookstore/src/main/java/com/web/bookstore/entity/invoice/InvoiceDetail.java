package com.web.bookstore.entity.invoice;

import com.web.bookstore.entity.product.Product;
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
public class InvoiceDetail {
    @Id
    private Integer id;
    @ManyToOne
    @JoinColumn
    private Invoice invoice;
    @ManyToOne
    @JoinColumn
    private Product product;
    private Integer quantity;
    private BigDecimal unitPrice;
    private BigDecimal totalPrice;
}
