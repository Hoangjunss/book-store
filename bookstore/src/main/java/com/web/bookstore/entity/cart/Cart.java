package com.web.bookstore.entity.cart;

import com.web.bookstore.entity.user.User;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.OneToOne;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class Cart {
    @Id
    private Integer id;
    @OneToOne
    @JoinColumn
    private User user;
    private Integer quantity;
    private Double price;
}
