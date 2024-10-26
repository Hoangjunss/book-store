package com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO;

import java.math.BigDecimal;
import java.time.LocalDate;

public class WarehouseReceiptUpdateDTO {
    private Integer id;

    private Integer idSupply;
    private Integer quantity;
    private BigDecimal totalPrice;
    private LocalDate date;

}
