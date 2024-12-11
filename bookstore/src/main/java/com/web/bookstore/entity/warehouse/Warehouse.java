package com.web.bookstore.entity.warehouse;

import com.web.bookstore.entity.product.Product;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.OneToOne;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;
import java.time.LocalDate;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class Warehouse {
    @Id
    private Integer id;
    @OneToOne
    @JoinColumn
    private Product product;
    private Integer quantity;
    private BigDecimal price;
    private Boolean status;
    private LocalDate date;

}
