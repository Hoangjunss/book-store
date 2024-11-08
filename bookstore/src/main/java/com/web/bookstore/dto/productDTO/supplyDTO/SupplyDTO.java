package com.web.bookstore.dto.productDTO.supplyDTO;

import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
public class SupplyDTO {
    private Integer id;
    private String name;
    private AddressDTO addressDTO;
}
