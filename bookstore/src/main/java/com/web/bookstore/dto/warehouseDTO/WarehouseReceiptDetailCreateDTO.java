package com.web.bookstore.dto.warehouseDTO;

import com.web.bookstore.entity.user.Supply;
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
public class WarehouseReceiptDetailCreateDTO {

    private Integer id;

    private Integer idProduct;
    private Integer quantity;
    private BigDecimal unitPrice;
    private BigDecimal totalPrice;
}
