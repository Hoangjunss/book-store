package com.web.bookstore.service.warehouseService;


import com.web.bookstore.dto.warehouseDTO.warehouseDTO.WarehouseCreateDTO;
import com.web.bookstore.dto.warehouseDTO.warehouseDTO.WarehouseDTO;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.warehouse.Warehouse;
import com.web.bookstore.mapper.WarehouseMapper;
import com.web.bookstore.repository.warehouse.WarehouseRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import java.math.BigDecimal;
import java.time.LocalDate;
import java.util.Optional;
import java.util.UUID;

@Service
public class WarehouseServiceImpl implements WarehouseService{
    @Autowired
    private WarehouseRepository warehouseRepository;

    @Autowired
    private WarehouseMapper warehouseMapper;
    @Override
    public void updateWarehouse(Product product, Integer quantity, BigDecimal unitPrice) {

            WarehouseCreateDTO warehouseCreateDTO = new WarehouseCreateDTO();
            warehouseCreateDTO.setIdProduct(product.getId());
            warehouseCreateDTO.setQuantity(quantity);
            warehouseCreateDTO.setPrice(unitPrice);
            warehouseCreateDTO.setStatus(true);
            warehouseCreateDTO.setDate(LocalDate.now());

           Warehouse warehouse = warehouseMapper.conventWarehouseCreateDTOToWarehouse(warehouseCreateDTO, product);


        warehouseRepository.save(warehouse);
    }
    @Override
    public Page<WarehouseDTO> getList(Pageable pageable) {
        // Retrieve paginated Warehouse entities
        Page<Warehouse> warehouses = warehouseRepository.findAll(pageable);

        // Map each Warehouse entity to WarehouseDTO and return as a Page
        return warehouses.map(warehouseMapper::conventWarehouseToWarehouseDTO);
    }
    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }

}
