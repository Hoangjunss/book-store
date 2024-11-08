package com.web.bookstore.dto.productDTO.productDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.web.multipart.MultipartFile;

import java.time.LocalDate;
@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
public class ProductCreateDTO {
    private Integer id;
    private String name;
    private String description;
    private String author;
    private Integer page;
    private Integer categoryId;
    private MultipartFile image;
    private LocalDate datePublic;
    private String size;
    private Integer supplyId;
    private Boolean status;
    private Integer quantity;
    private Double price;
}
