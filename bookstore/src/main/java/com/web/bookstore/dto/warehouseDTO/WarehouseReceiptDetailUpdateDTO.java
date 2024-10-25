package com.web.bookstore.dto.warehouseDTO;

import com.web.bookstore.entity.product.Product;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

import java.math.BigDecimal;

public class WarehouseReceiptDetailUpdateDTO {

    private Integer id;

    private Integer idProduct;
    private Integer quantity;
    private BigDecimal unitPrice;
    private BigDecimal totalPrice;
}
