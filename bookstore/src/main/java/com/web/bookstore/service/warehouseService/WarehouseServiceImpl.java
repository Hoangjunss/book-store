package com.web.bookstore.service.warehouseService;

import com.web.bookstore.dto.warehouseDTO.WarehouseCreateDTO;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.warehouse.Warehouse;
import com.web.bookstore.mapper.WarehouseMapper;
import com.web.bookstore.repository.warehouse.WarehouseRepository;
import org.springframework.beans.factory.annotation.Autowired;

import java.math.BigDecimal;
import java.time.LocalDate;
import java.util.Optional;

public class WarehouseServiceImpl implements WarehouseService{
    @Autowired
    private WarehouseRepository warehouseRepository;

    @Autowired
    private WarehouseMapper warehouseMapper;
    @Override
    public void updateWarehouse(Product product, Integer quantity, BigDecimal unitPrice) {
        Optional<Warehouse> optionalWarehouse = warehouseRepository.findByProduct(product);
        Warehouse warehouse;

        if (optionalWarehouse.isPresent()) {
            warehouse = optionalWarehouse.get();
            warehouse.setQuantity(warehouse.getQuantity() + quantity);
            warehouse.setPrice(unitPrice);
            warehouse.setDate(LocalDate.now());
        } else {
            WarehouseCreateDTO warehouseCreateDTO = new WarehouseCreateDTO();
            warehouseCreateDTO.setIdProduct(product.getId());
            warehouseCreateDTO.setQuantity(quantity);
            warehouseCreateDTO.setPrice(unitPrice);
            warehouseCreateDTO.setStatus(true);
            warehouseCreateDTO.setDate(LocalDate.now());

            warehouse = warehouseMapper.conventWarehouseCreateDTOToWarehouse(warehouseCreateDTO, product);
        }

        warehouseRepository.save(warehouse);
    }

}
