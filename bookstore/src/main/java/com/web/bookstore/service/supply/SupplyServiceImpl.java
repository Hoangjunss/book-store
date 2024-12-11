package com.web.bookstore.service.supply;

import com.web.bookstore.dto.otherDTO.addressDTO.AddressDTO;
import com.web.bookstore.dto.productDTO.supplyDTO.SupplyCreateDTO;
import com.web.bookstore.dto.productDTO.supplyDTO.SupplyDTO;
import com.web.bookstore.entity.RedisConstant;
import com.web.bookstore.entity.user.Supply;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.AddressMapper;
import com.web.bookstore.mapper.SupplyMapper;
import com.web.bookstore.repository.user.SupplyRepository;
import com.web.bookstore.service.other.AddressService;
import com.web.bookstore.service.redis.RedisService;
import jakarta.transaction.Transactional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageImpl;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;
import java.util.UUID;
import java.util.stream.Collectors;

@Service
public class SupplyServiceImpl implements SupplyService {

    @Autowired
    private SupplyRepository supplyRepository;

    @Autowired
    private SupplyMapper supplyMapper;
    @Autowired
    private AddressService addressService;
    @Autowired
    private AddressMapper addressMapper;


    @Override
    public SupplyDTO createSupply(SupplyCreateDTO supplyCreateDTO) {
        Supply supply = supplyMapper.conventSupplyCreateDTOToSupply(supplyCreateDTO);
        supply.setId(getGenerationId());
        AddressDTO addressDTO=addressService.createAddress(supplyCreateDTO.getAddressCreateDTO());
        supply.setAddress(addressMapper.convertAddressDTOToAddress(addressDTO));
        Supply savedSupply = supplyRepository.save(supply);
        SupplyDTO savedSupplyDTO = supplyMapper.conventSupplyToSupplyDTO(savedSupply);





        return savedSupplyDTO;
    }

    @Override
    public SupplyDTO updateSupply(SupplyDTO supplyDTO) {
        // Check if the supply exists
        Optional<Supply> existingSupplyOptional = supplyRepository.findById(supplyDTO.getId());
        if (!existingSupplyOptional.isPresent()) {
            throw new RuntimeException("Supply not found");
        }

        // Update supply information
        Supply existingSupply = existingSupplyOptional.get();
        Supply updatedSupply = supplyMapper.conventSupplyDTOToSupply(supplyDTO);
        updatedSupply.setId(existingSupply.getId());

        Supply savedSupply = supplyRepository.save(updatedSupply);
        SupplyDTO savedSupplyDTO = supplyMapper.conventSupplyToSupplyDTO(savedSupply);


        return savedSupplyDTO;
    }

    @Override
    public SupplyDTO deleteSupply(Integer id) {
        // Check if supply exists
        Optional<Supply> existingSupplyOptional = supplyRepository.findById(id);
        if (!existingSupplyOptional.isPresent()) {
            throw new RuntimeException("Supply not found");
        }

        // Mark supply as deleted (soft delete)
        Supply existingSupply = existingSupplyOptional.get();
        existingSupply.setStatus(false);
        Supply savedSupply = supplyRepository.save(existingSupply);
        SupplyDTO deletedSupplyDTO = supplyMapper.conventSupplyToSupplyDTO(savedSupply);

        // Remove the supply from Redis cache by ID

        return deletedSupplyDTO;
    }

    @Override
    public Page<SupplyDTO> getList(Pageable pageable) {
        // Use the cache key to represent the specific page in the list
        String cacheKey = RedisConstant.LIST_SUPPLY + pageable.getPageNumber() + "-" + pageable.getPageSize();


        // Retrieve supplies with pagination from the database if not cached
        Page<Supply> supplies = supplyRepository.findAll(pageable);
        Page<SupplyDTO> supplyDTOPage = supplies.map(supplyMapper::conventSupplyToSupplyDTO);

        // Cache each SupplyDTO in Redis under the list key for pagination


        return supplyDTOPage;
    }

    @Override
    public SupplyDTO findById(Integer id) {
        // Attempt to retrieve the supply from Redis cache by ID


        // Retrieve supply from the database if not cached
        Supply supply = supplyRepository.findById(id).orElseThrow(() -> new RuntimeException("Supply not found"));
        SupplyDTO supplyDTO = supplyMapper.conventSupplyToSupplyDTO(supply);

        // Cache the retrieved supply by ID and in the list


        return supplyDTO;
    }

    @Override
    @Transactional
    public SupplyDTO toggleSupplyStatus(Integer id) {
        // Tìm Supply theo ID
        Supply supply = supplyRepository.findById(id)
                .orElseThrow(() -> new CustomException(Error.SUPPLY_NOT_FOUND));

        // Nghịch đảo trạng thái
        supply.setStatus(!supply.isStatus());

        // Lưu lại Supply đã cập nhật
        Supply updatedSupply = supplyRepository.save(supply);

        // Chuyển đổi thành DTO và trả về
        return supplyMapper.conventSupplyToSupplyDTO(updatedSupply);
    }

    @Override
    public List<SupplyDTO> findSuppliesByNameContaining(String name) {
        // Tìm các Supply chứa chuỗi tên bất kỳ
        List<Supply> supplies = supplyRepository.findByNameContaining(name);

        // Chuyển đổi danh sách Supply entity sang SupplyDTO
        return supplies.stream()
                .map(supplyMapper::conventSupplyToSupplyDTO)
                .collect(Collectors.toList());
    }

    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}