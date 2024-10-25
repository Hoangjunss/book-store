package com.web.bookstore.dto.warehouseDTO;

import java.math.BigDecimal;
import java.time.LocalDate;
import java.util.List;

public class WarehouseReceiptUpdateDTO {
    private Integer id;

    private Integer idSupply;
    private Integer quantity;
    private BigDecimal totalPrice;
    private LocalDate date;

}
