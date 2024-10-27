package com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO;

import com.web.bookstore.entity.product.Product;
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

public class WarehouseReceiptDetailUpdateDTO {

    private Integer id;

    private Integer idProduct;
    private Integer quantity;
    private BigDecimal unitPrice;
    private BigDecimal totalPrice;
}