package com.web.bookstore.dto.invoiceDTO.invoiceDTO;

import com.web.bookstore.dto.invoiceDTO.invoicedetailDTO.InvoiceDetailCreateDTO;
import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;
import java.util.List;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class InvoiceCreateDTO {
    private Integer  id;

    private Integer quantity;
    private BigDecimal totalPrice;
    private AddressDTO address;
    private List<InvoiceDetailCreateDTO> invoiceCreateDTOS;
}
