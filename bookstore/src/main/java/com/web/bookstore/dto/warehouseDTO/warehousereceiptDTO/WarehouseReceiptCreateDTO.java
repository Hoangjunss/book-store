package com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO;

import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailCreateDTO;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;
import java.time.LocalDate;
import java.util.List;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
public class WarehouseReceiptCreateDTO {



    private Integer idSupply;
    private Integer quantity;
    private BigDecimal totalPrice;
    private LocalDate date;
    private List<WarehouseReceiptDetailCreateDTO> wareHouseReceiptDetailDTOS;

}