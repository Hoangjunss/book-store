package com.web.bookstore.service.supply;

import com.web.bookstore.dto.productDTO.supplyDTO.SupplyCreateDTO;
import com.web.bookstore.dto.productDTO.supplyDTO.SupplyDTO;
import com.web.bookstore.entity.RedisConstant;
import com.web.bookstore.entity.user.Supply;
import com.web.bookstore.mapper.SupplyMapper;
import com.web.bookstore.repository.user.SupplyRepository;
import com.web.bookstore.service.redis.RedisService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageImpl;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;
import java.util.UUID;

@Service
public class SupplyServiceImpl implements SupplyService {

    @Autowired
    private SupplyRepository supplyRepository;

    @Autowired
    private SupplyMapper supplyMapper;
    @Autowired
    private RedisService redisService;

    @Override
    public SupplyDTO createSupply(SupplyCreateDTO supplyCreateDTO) {
        Supply supply = supplyMapper.conventSupplyCreateDTOToSupply(supplyCreateDTO);
        supply.setId(getGenerationId());

        Supply savedSupply = supplyRepository.save(supply);
        SupplyDTO savedSupplyDTO = supplyMapper.conventSupplyToSupplyDTO(savedSupply);

        // Cache the newly created supply by ID
        redisService.set(RedisConstant.SUPPLY_ID + savedSupply.getId(), savedSupplyDTO);

        // Add the new supply to the cached list
        redisService.hashSet(RedisConstant.LIST_SUPPLY, String.valueOf(savedSupply.getId()), savedSupplyDTO);

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

        // Update the supply in Redis cache by ID
        redisService.set(RedisConstant.SUPPLY_ID + savedSupply.getId(), savedSupplyDTO);

        // Update the supply in the cached list
        redisService.hashSet(RedisConstant.LIST_SUPPLY, String.valueOf(savedSupply.getId()), savedSupplyDTO);

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
        redisService.delete(RedisConstant.SUPPLY_ID + id);

        // Remove the supply from the cached list
        redisService.delete(RedisConstant.LIST_SUPPLY, String.valueOf(id));

        return deletedSupplyDTO;
    }

    @Override
    public Page<SupplyDTO> getList(Pageable pageable) {
        // Use the cache key to represent the specific page in the list
        String cacheKey = RedisConstant.LIST_SUPPLY + pageable.getPageNumber() + "-" + pageable.getPageSize();
        List<SupplyDTO> cachedSupplyList = redisService.hashGetAll(cacheKey, SupplyDTO.class);

        if (!cachedSupplyList.isEmpty()) {
            // Return cached supplies as a Page
            return new PageImpl<>(cachedSupplyList, pageable, cachedSupplyList.size());
        }

        // Retrieve supplies with pagination from the database if not cached
        Page<Supply> supplies = supplyRepository.findAll(pageable);
        Page<SupplyDTO> supplyDTOPage = supplies.map(supplyMapper::conventSupplyToSupplyDTO);

        // Cache each SupplyDTO in Redis under the list key for pagination
        supplyDTOPage.forEach(supplyDTO ->
                redisService.hashSet(cacheKey, String.valueOf(supplyDTO.getId()), supplyDTO)
        );

        return supplyDTOPage;
    }

    @Override
    public SupplyDTO findById(Integer id) {
        // Attempt to retrieve the supply from Redis cache by ID
        SupplyDTO cachedSupply = (SupplyDTO) redisService.get(RedisConstant.SUPPLY_ID + id);

        if (cachedSupply != null) {
            return cachedSupply;
        }

        // Retrieve supply from the database if not cached
        Supply supply = supplyRepository.findById(id).orElseThrow(() -> new RuntimeException("Supply not found"));
        SupplyDTO supplyDTO = supplyMapper.conventSupplyToSupplyDTO(supply);

        // Cache the retrieved supply by ID and in the list
        redisService.set(RedisConstant.SUPPLY_ID + id, supplyDTO);
        redisService.hashSet(RedisConstant.LIST_SUPPLY, String.valueOf(supplyDTO.getId()), supplyDTO);

        return supplyDTO;
    }

    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}