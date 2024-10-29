package com.web.bookstore.service.supply;

import com.web.bookstore.dto.productDTO.supplyDTO.SupplyCreateDTO;
import com.web.bookstore.dto.productDTO.supplyDTO.SupplyDTO;
import com.web.bookstore.entity.user.Supply;
import com.web.bookstore.mapper.SupplyMapper;
import com.web.bookstore.repository.user.SupplyRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class SupplyServiceImpl implements SupplyService {

    @Autowired
    private SupplyRepository supplyRepository;

    @Autowired
    private SupplyMapper supplyMapper;

    @Override
    public SupplyDTO createSupply(SupplyCreateDTO supplyCreateDTO) {

        Supply supply = supplyMapper.conventSupplyCreateDTOToSupply(supplyCreateDTO);


        Supply savedSupply = supplyRepository.save(supply);


        return supplyMapper.conventSupplyToSupplyDTO(savedSupply);
    }

    @Override
    public SupplyDTO updateSupply(SupplyDTO supplyDTO) {
        // Check if supply exists
        Optional<Supply> existingSupplyOptional = supplyRepository.findById(supplyDTO.getId());
        if (!existingSupplyOptional.isPresent()) {
            throw new RuntimeException("Supply not found");
        }


        Supply existingSupply = existingSupplyOptional.get();
        Supply updatedSupply = supplyMapper.conventSupplyDTOToSupply(supplyDTO);
        updatedSupply.setId(existingSupply.getId());


        Supply savedSupply = supplyRepository.save(updatedSupply);

        // Convert saved Supply entity to SupplyDTO
        return supplyMapper.conventSupplyToSupplyDTO(savedSupply);
    }

    @Override
    public SupplyDTO deleteSupply(Integer id) {
        // Check if supply exists
        Optional<Supply> existingSupplyOptional = supplyRepository.findById(id);
        if (!existingSupplyOptional.isPresent()) {
            throw new RuntimeException("Supply not found");
        }

        // Delete the supply from the database
        Supply existingSupply = existingSupplyOptional.get();
        existingSupply.setStatus(false);
        supplyRepository.save(existingSupply);

        // Convert deleted Supply entity to SupplyDTO
        return supplyMapper.conventSupplyToSupplyDTO(existingSupply);
    }

    @Override
    public Page<SupplyDTO> getList(Pageable pageable) {
        // Retrieve all supplies with pagination
        Page<Supply> supplies = supplyRepository.findAll(pageable);

        // Convert each Supply entity to SupplyDTO and return as a list
        return supplies.map(supplyMapper::conventSupplyToSupplyDTO);
    }
}