package com.web.bookstore.mapper;

import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
import com.web.bookstore.dto.productDTO.supplyDTO.SupplyCreateDTO;
import com.web.bookstore.dto.productDTO.supplyDTO.SupplyDTO;
import com.web.bookstore.entity.other.Address;
import com.web.bookstore.entity.user.Supply;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;

import java.util.List;

public class SupplyMapper {
    @Autowired
    private ModelMapper modelMapper;
    @Autowired
    private AddressMapper addressMapper;
    public Supply conventSupplyCreateDTOToSupply(SupplyCreateDTO supplyCreateDTO){
        Supply supply=modelMapper.map(supplyCreateDTO, Supply.class);
        Address address=addressMapper.convertAddressCreateDTOToAddress(supplyCreateDTO.getAddressCreateDTO());
        supply.setAddress(address);
        return supply;
    }
    public Supply conventSupplyDTOToSupply(SupplyDTO supplyCreateDTO){
        Supply supply=modelMapper.map(supplyCreateDTO, Supply.class);
        Address address=addressMapper.convertAddressDTOToAddress(supplyCreateDTO.getAddressDTO());
        supply.setAddress(address);
        return supply;
    }
    public SupplyDTO conventSupplyToSupplyDTO(Supply supply){
        SupplyDTO supplyDTO=modelMapper.map(supply, SupplyDTO.class);
        AddressDTO addressDTO=addressMapper.convertAddressToAddressDTO(supply.getAddress());
        supplyDTO.setAddressDTO(addressDTO);
        return supplyDTO;
    }
}
