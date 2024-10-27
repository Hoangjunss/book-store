package com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO;

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
public class WareHouseReceiptCreateDTO {



    private Integer idSupply;
    private Integer quantity;
    private BigDecimal totalPrice;
    private LocalDate date;
    private List<WarehouseReceiptDetailCreateDTO> wareHouseReceiptDetailDTOS;

}
