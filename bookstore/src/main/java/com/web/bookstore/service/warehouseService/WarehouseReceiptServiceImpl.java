package com.web.bookstore.service.warehouseService;

import com.web.bookstore.dto.warehouseDTO.*;
import com.web.bookstore.entity.user.Supply;
import com.web.bookstore.entity.warehouse.WarehouseReceipt;
import com.web.bookstore.entity.warehouse.WarehouseReceiptDetail;
import com.web.bookstore.mapper.WarehouseMapper;
import com.web.bookstore.repository.user.SuplyRepository;
import com.web.bookstore.repository.warehouse.WarehouseReceiptRepository;
import org.springframework.beans.factory.annotation.Autowired;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

public class WarehouseReceiptServiceImpl implements WareHouseReceiptService{

    @Autowired
    private WarehouseReceiptRepository warehouseReceiptRepository;

    @Autowired
    private SuplyRepository supplyRepository;

    @Autowired
    private WarehouseMapper warehouseMapper;

    @Autowired
    private WarehouseReceiptDetailService warehouseReceiptDetailService;
    @Override
    public WarehouseReceiptDTO addWarehouseReceipt(WareHouseReceiptCreateDTO createDTO) {
        Optional<Supply> optionalSupply = supplyRepository.findById(createDTO.getIdSupply());
        if (!optionalSupply.isPresent()) {
            throw new RuntimeException("Supply not found");
        }
        Supply supply = optionalSupply.get();

        WarehouseReceipt warehouseReceipt = warehouseMapper.convertWarehouseReceiptCreateDTOToWarehouseReceipt(createDTO, supply);
        WarehouseReceipt savedWarehouseReceipt = warehouseReceiptRepository.save(warehouseReceipt);

        List<WarehouseReceiptDetail> warehouseReceiptDetails = new ArrayList<>();
        for (WarehouseReceiptDetailCreateDTO detailDTO : createDTO.getWareHouseReceiptDetailDTOS()) {
            WarehouseReceiptDetail detail = warehouseReceiptDetailService.addWarehouseReceiptDetail(savedWarehouseReceipt, detailDTO);
            warehouseReceiptDetails.add(detail);
        }

        WarehouseReceiptDTO warehouseReceiptDTO = warehouseMapper.convertWarehouseReceiptToWarehouseReceiptDTO(savedWarehouseReceipt, warehouseReceiptDetails);
        return warehouseReceiptDTO;
    }

    @Override
    public WarehouseReceiptDTO updateWarehouseReceipt(WarehouseReceiptUpdateDTO updateDTO) {
        Optional<WarehouseReceipt> optionalWarehouseReceipt = warehouseReceiptRepository.findById(updateDTO.getId());
        if (!optionalWarehouseReceipt.isPresent()) {
            throw new RuntimeException("WarehouseReceipt not found");
        }
        WarehouseReceipt warehouseReceipt = optionalWarehouseReceipt.get();

        Optional<Supply> optionalSupply = supplyRepository.findById(updateDTO.getIdSupply());
        if (!optionalSupply.isPresent()) {
            throw new RuntimeException("Supply not found");
        }
        Supply supply = optionalSupply.get();

        warehouseReceipt = warehouseMapper.convertWarehouseReceiptUpdateDTOToWarehouseReceipt(updateDTO, supply);
        WarehouseReceipt savedWarehouseReceipt = warehouseReceiptRepository.save(warehouseReceipt);

        List<WarehouseReceiptDetail> warehouseReceiptDetails = new ArrayList<>();
        for (WarehouseReceiptDetailUpdateDTO detailDTO : updateDTO.getWareHouseReceiptDetailDTOS()) {
            WarehouseReceiptDetail detail = warehouseReceiptDetailService.updateWarehouseReceiptDetail(savedWarehouseReceipt, detailDTO);
            warehouseReceiptDetails.add(detail);
        }

        WarehouseReceiptDTO warehouseReceiptDTO = warehouseMapper.convertWarehouseReceiptToWarehouseReceiptDTO(savedWarehouseReceipt, warehouseReceiptDetails);
        return warehouseReceiptDTO;
    }

}
