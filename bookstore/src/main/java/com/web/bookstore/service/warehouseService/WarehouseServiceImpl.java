package com.web.bookstore.service.warehouseService;


import com.web.bookstore.dto.warehouseDTO.warehouseDTO.WarehouseCreateDTO;
import com.web.bookstore.dto.warehouseDTO.warehouseDTO.WarehouseDTO;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.warehouse.Warehouse;
import com.web.bookstore.mapper.WarehouseMapper;
import com.web.bookstore.repository.product.ProductRepository;
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
    @Autowired
    private ProductRepository productRepository;
    @Override
    public void updateWarehouse(Product product, Integer quantity, BigDecimal unitPrice) {

            WarehouseDTO warehouseDTO=getIdProduct(product.getId());
            warehouseDTO.setPrice(warehouseDTO.getPrice().add(unitPrice));
            warehouseDTO.setQuantity(warehouseDTO.getQuantity()+quantity);

           Warehouse warehouse = Warehouse.builder().id(warehouseDTO.getId()).date(warehouseDTO.getDate()).price(warehouseDTO.getPrice()).product(product).quantity(warehouseDTO.getQuantity()).status(warehouseDTO.getStatus()).build();


        warehouseRepository.save(warehouse);
    }
    @Override
    public Page<WarehouseDTO> getList(Pageable pageable) {
        // Retrieve paginated Warehouse entities
        Page<Warehouse> warehouses = warehouseRepository.findAll(pageable);

        // Map each Warehouse entity to WarehouseDTO and return as a Page
        return warehouses.map(warehouseMapper::conventWarehouseToWarehouseDTO);
    }

    @Override
    public WarehouseDTO getIdProduct(Integer id) {
        Product product=productRepository.findById(id).orElseThrow();
        Warehouse warehouse=warehouseRepository.findByProduct(product);
        return warehouseMapper.conventWarehouseToWarehouseDTO(warehouse);
    }

    @Override
    public Page<WarehouseDTO> getIdProductThanQuantity(Pageable pageable, Integer id) {
        Product product=productRepository.findById(id).orElseThrow();
        Page<Warehouse> warehousePage=warehouseRepository.findAllByProductAndQuantityGreaterThan(pageable,product,0);
        return warehousePage.map(warehouseMapper::conventWarehouseToWarehouseDTO);
    }

    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }

}
