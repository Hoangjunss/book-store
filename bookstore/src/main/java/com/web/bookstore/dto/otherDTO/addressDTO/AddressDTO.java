package com.web.bookstore.dto.otherDTO.addressDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class AddressDTO {
    private Integer id;
    private String fullName;
    private String email;
    private String province;
    private String district;
    private String ward;
    private String detailAddress;
    private String phone;
}
