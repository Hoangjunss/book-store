package com.web.bookstore.dto.product;

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
}
