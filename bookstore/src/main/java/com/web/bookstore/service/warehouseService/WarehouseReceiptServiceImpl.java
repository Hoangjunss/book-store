package com.web.bookstore.service.warehouseService;


import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WarehouseReceiptCreateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WarehouseReceiptDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WarehouseReceiptUpdateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailCreateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailUpdateDTO;
import com.web.bookstore.entity.user.Supply;
import com.web.bookstore.entity.warehouse.WarehouseReceipt;
import com.web.bookstore.entity.warehouse.WarehouseReceiptDetail;
import com.web.bookstore.mapper.WarehouseMapper;

import com.web.bookstore.repository.user.SupplyRepository;
import com.web.bookstore.repository.warehouse.WarehouseReceiptDetailRepository;
import com.web.bookstore.repository.warehouse.WarehouseReceiptRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
@Service
public class WarehouseReceiptServiceImpl implements WarehouseReceiptService{

    @Autowired
    private WarehouseReceiptRepository warehouseReceiptRepository;

    @Autowired
    private SupplyRepository supplyRepository;

    @Autowired
    private WarehouseMapper warehouseMapper;

    @Autowired
    private WarehouseReceiptDetailService warehouseReceiptDetailService;
    @Autowired
    private WarehouseReceiptDetailRepository warehouseReceiptDetailRepository;

    @Override
    public WarehouseReceiptDTO addWarehouseReceipt(WarehouseReceiptCreateDTO createDTO) {

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
    @Override
    public Page<WarehouseReceiptDTO> getList(Pageable pageable) {
        // Retrieve paginated WarehouseReceipt entities
        Page<WarehouseReceipt> warehouseReceipts = warehouseReceiptRepository.findAll(pageable);

        // Map each WarehouseReceipt entity to WarehouseReceiptDTO, including details
        return warehouseReceipts.map(warehouseReceipt -> {
            // Fetch associated WarehouseReceiptDetails for each WarehouseReceipt
            List<WarehouseReceiptDetail> warehouseReceiptDetails = warehouseReceiptDetailRepository
                    .findByWarehouseReceipt(warehouseReceipt);

            // Use the existing mapper to convert to WarehouseReceiptDTO with details
            return warehouseMapper.convertWarehouseReceiptToWarehouseReceiptDTO(warehouseReceipt, warehouseReceiptDetails);
        });
    }

    @Override
    public WarehouseReceiptDTO findById(Integer id) {
        WarehouseReceipt warehouseReceipt=warehouseReceiptRepository.findById(id).orElseThrow();
        List<WarehouseReceiptDetail> warehouseReceiptDetails=warehouseReceiptDetailRepository.findByWarehouseReceipt(warehouseReceipt);
        return warehouseMapper.convertWarehouseReceiptToWarehouseReceiptDTO(warehouseReceipt,warehouseReceiptDetails);
    }
}
