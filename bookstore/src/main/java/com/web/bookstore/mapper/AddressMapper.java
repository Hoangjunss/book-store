package com.web.bookstore.mapper;

import com.web.bookstore.dto.otherDTO.addressDTO.AddressCreateDTO;
import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
import com.web.bookstore.entity.other.Address;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;


@Component
public class AddressMapper {

    @Autowired
    private ModelMapper modelMapper;

    public Address convertAddressCreateDTOToAddress(AddressCreateDTO addressCreateDTO) {
        return modelMapper.map(addressCreateDTO, Address.class);
    }

    public Address convertAddressDTOToAddress(AddressDTO addressDTO) {
        return modelMapper.map(addressDTO, Address.class);
    }

    public AddressDTO convertAddressToAddressDTO(Address address) {
        return modelMapper.map(address, AddressDTO.class);
    }

    public List<AddressDTO> convertAddressListToAddressDTOList(List<Address> addresses) {
        return addresses.stream()
                .map(this::convertAddressToAddressDTO)
                .collect(Collectors.toList());
    }
}
