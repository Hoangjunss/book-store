package com.web.bookstore.dto.productDTO.productDTO;

import lombok.Data;

@Data
public class ProductSearchCriteria {
    private Integer categoryId;
    private String bookName;
    private Boolean status;
}
