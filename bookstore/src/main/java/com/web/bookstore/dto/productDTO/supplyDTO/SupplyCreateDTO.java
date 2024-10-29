package com.web.bookstore.dto.productDTO.supplyDTO;

import com.web.bookstore.dto.otherDTO.addressDTO.AddressCreateDTO;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
public class SupplyCreateDTO {

    private String name;
    private AddressCreateDTO addressCreateDTO;

}
