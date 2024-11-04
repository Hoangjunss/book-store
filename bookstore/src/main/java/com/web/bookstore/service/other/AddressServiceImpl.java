package com.web.bookstore.service.other;

import com.web.bookstore.dto.otherDTO.addressDTO.AddressCreateDTO;
import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
import com.web.bookstore.entity.other.Address;
import com.web.bookstore.mapper.AddressMapper;
import com.web.bookstore.repository.other.AddressRepository;
import org.springframework.beans.factory.annotation.Autowired;

public class AddressServiceImpl implements AddressService {
    @Autowired
    private AddressMapper addressMapper;
    @Autowired
    private AddressRepository addressRepository;

    @Override
    public AddressDTO createAddress(AddressCreateDTO addressCreateDTO) {
        Address address=addressMapper.convertAddressCreateDTOToAddress(addressCreateDTO);
        return addressMapper.convertAddressToAddressDTO(addressRepository.save(address));
    }
}
