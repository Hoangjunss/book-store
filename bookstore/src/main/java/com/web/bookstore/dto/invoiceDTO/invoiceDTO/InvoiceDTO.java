package com.web.bookstore.dto.invoiceDTO.invoiceDTO;

import com.web.bookstore.dto.invoiceDTO.invoicedetailDTO.InvoiceDetailDTO;
import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
import com.web.bookstore.entity.other.Address;
import com.web.bookstore.entity.user.User;
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
public class InvoiceDTO {
    private Integer  id;

    private Integer quantity;
    private BigDecimal totalPrice;
    private AddressDTO address;
    private List<InvoiceDetailDTO>invoiceDetailDTOS;
}
