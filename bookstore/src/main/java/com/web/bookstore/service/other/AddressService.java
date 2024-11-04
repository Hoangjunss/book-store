package com.web.bookstore.service.other;

import com.web.bookstore.dto.otherDTO.addressDTO.AddressCreateDTO;
import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
import org.springframework.stereotype.Service;

@Service
public interface AddressService {
    AddressDTO createAddress(AddressCreateDTO addressCreateDTO);
}
