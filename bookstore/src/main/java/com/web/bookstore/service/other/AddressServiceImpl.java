package com.web.bookstore.service.other;

import com.web.bookstore.dto.otherDTO.addressDTO.AddressCreateDTO;
import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
import com.web.bookstore.entity.other.Address;
import com.web.bookstore.mapper.AddressMapper;
import com.web.bookstore.repository.other.AddressRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.UUID;

@Service
public class AddressServiceImpl implements AddressService {
    @Autowired
    private AddressMapper addressMapper;
    @Autowired
    private AddressRepository addressRepository;

    @Override
    public AddressDTO createAddress(AddressCreateDTO addressCreateDTO) {
        Address address=addressMapper.convertAddressCreateDTOToAddress(addressCreateDTO);
        address.setId(getGenerationId());
        return addressMapper.convertAddressToAddressDTO(addressRepository.save(address));
    }
    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
