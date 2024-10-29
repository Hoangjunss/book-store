package com.web.bookstore.entity.order;

import com.web.bookstore.entity.other.Address;
import com.web.bookstore.entity.user.User;
import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.math.BigDecimal;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class Orders {
    @Id
    private Integer  id;
    @ManyToOne
    @JoinColumn
    private User user;
    private Integer quantity;
    private BigDecimal totalPrice;
    @ManyToOne
    @JoinColumn
    private Address address;
    @Enumerated(EnumType.STRING)
    private OrderStatus orderStatus;
}
