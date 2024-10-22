package com.web.bookstore.entity.product;

import com.web.bookstore.entity.user.Supply;
import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.time.LocalDate;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class Product {
    @Id
    private Integer id;
    private String name;
    private String description;
    private String author;
    private Integer page;
    @ManyToOne
    @JoinColumn
    private Category category;
    @OneToOne
    @JoinColumn
    private Image image;
    private LocalDate datePublic;
    private String size;
    @ManyToOne
    @JoinColumn
    private Supply supply;
    private Boolean status;
}
