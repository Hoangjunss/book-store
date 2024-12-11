package com.web.bookstore.service.supply;

import com.web.bookstore.dto.productDTO.supplyDTO.SupplyCreateDTO;
import com.web.bookstore.dto.productDTO.supplyDTO.SupplyDTO;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

import java.util.List;

public interface SupplyService {
    SupplyDTO createSupply(SupplyCreateDTO supplyCreateDTO);
    SupplyDTO updateSupply(SupplyDTO supplyDTO);
    SupplyDTO deleteSupply(Integer id);
    Page<SupplyDTO> getList(Pageable pageable);
    SupplyDTO findById(Integer id);
    SupplyDTO toggleSupplyStatus(Integer id);
    List<SupplyDTO> findSuppliesByNameContaining(String name);
}
