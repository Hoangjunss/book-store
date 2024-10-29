package com.web.bookstore.dto.invoiceDTO.invoicedetailDTO;

import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;
import com.web.bookstore.entity.invoice.Invoice;
import com.web.bookstore.entity.product.Product;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
public class InvoiceDetailDTO {
    private Integer id;
    private Invoice invoice;
    private ProductDTO product;
    private Integer quantity;
    private BigDecimal unitPrice;
    private BigDecimal totalPrice;
}
