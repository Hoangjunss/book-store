package com.web.bookstore.entity.user;

import com.web.bookstore.entity.other.Address;
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
public class Supply {
    @Id
    private Integer id;
    private String name;
    @ManyToOne
    @JoinColumn
    private Address address;
}
