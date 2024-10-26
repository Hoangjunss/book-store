package com.web.bookstore.dto.otherDTO.addressDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class AddressCreateDTO {
    private Integer id;
    private String address;
    private String phone;
}
