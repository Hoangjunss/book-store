package com.web.bookstore.entity.other;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class Address {
    @Id
    private Integer id;
    private String fullName;
    private String email;
    private String province;
    private String district;
    private String ward;
    private String detailAddress;
    private String phone;
}
