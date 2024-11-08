package com.web.bookstore.dto.productDTO.productDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.time.LocalDate;
@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
public class ProductDTO {
    private Integer id;
    private String name;
    private String description;
    private String author;
    private Integer page;
    private String category;
    private String image;
    private LocalDate datePublic;
    private String size;
    private String supply;
    private Boolean status;
    private Integer quantity;
    private Double price;
}
