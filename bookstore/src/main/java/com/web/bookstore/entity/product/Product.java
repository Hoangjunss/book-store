package com.web.bookstore.entity.product;

import com.web.bookstore.entity.user.Supply;
import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class Product {
    @Id
    private Integer id;
    private String name;
    @Column(columnDefinition = "TEXT")
    private String description;
    private String author;
    private Integer page;
    @ManyToOne
    @JoinColumn
    private Category category;
    @OneToOne
    @JoinColumn
    private Image image;

    private String size;
    @ManyToOne
    @JoinColumn
    private Supply supply;
    private Boolean status;
    private Integer quantity;
    private Double price;
}
