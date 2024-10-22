package com.web.bookstore.entity.warehouse;

import com.web.bookstore.entity.user.Supply;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
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
public class WarehouseReceipt {
    @Id
    private Integer id;
    @ManyToOne
    @JoinColumn
    private Supply supply;
    private Integer quantity;
    private BigDecimal totalPrice;
    private LocalDate date;
}
