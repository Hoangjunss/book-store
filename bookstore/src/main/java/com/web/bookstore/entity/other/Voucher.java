package com.web.bookstore.entity.other;

import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.user.User;
import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.time.LocalDate;
import java.util.List;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class Voucher {
    @Id
    private Integer id;
    private String nameVoucher;
    private Float percent;
    private LocalDate startDate;
    private LocalDate endDate;
    @ManyToMany
    @JoinTable
    private List<Product> products;
    @ManyToMany
    @JoinTable
    private List<User> users;

}
