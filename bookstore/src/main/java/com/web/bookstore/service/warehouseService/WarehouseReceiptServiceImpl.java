package com.web.bookstore.service.warehouseService;


import com.web.bookstore.dto.StaticWarehouseReceiptDTO;
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

import java.math.BigDecimal;
import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.UUID;
import java.util.stream.Collectors;

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
    public StaticWarehouseReceiptDTO staticWarehouseReceipt(String month, String year) {

        // Lấy danh sách tất cả các WarehouseReceipt
        List<WarehouseReceipt> receipts = warehouseReceiptRepository.findAll();

        // Lọc theo tháng và năm
        List<WarehouseReceipt> filteredReceipts = receipts.stream()
                .filter(receipt -> {
                    LocalDate receiptDate = receipt.getDate(); // Giả định `date` là kiểu LocalDate
                    boolean matchMonth = (month == null || receiptDate.getMonthValue() == Integer.parseInt(month));
                    boolean matchYear = (year == null || receiptDate.getYear() == Integer.parseInt(year));
                    return matchMonth && matchYear;
                })
                .collect(Collectors.toList());

        // Tính tổng số lượng và tổng giá trị
        int totalQuantity = filteredReceipts.stream()
                .mapToInt(WarehouseReceipt::getQuantity)
                .sum();

        BigDecimal totalRevenue = filteredReceipts.stream()
                .map(WarehouseReceipt::getTotalPrice)
                .reduce(BigDecimal.ZERO, BigDecimal::add);

        // Tạo DTO và trả về
        StaticWarehouseReceiptDTO receiptDto = new StaticWarehouseReceiptDTO();

        receiptDto.setTotalQuantity(totalQuantity);
        receiptDto.setTotalPrice(totalRevenue);

        return receiptDto;
    }

    @Override
    public WarehouseReceiptDTO addWarehouseReceipt(WarehouseReceiptCreateDTO createDTO) {

        Optional<Supply> optionalSupply = supplyRepository.findById(createDTO.getIdSupply());
        if (!optionalSupply.isPresent()) {
            throw new RuntimeException("Supply not found");
        }
        Supply supply = optionalSupply.get();

        WarehouseReceipt warehouseReceipt = warehouseMapper.convertWarehouseReceiptCreateDTOToWarehouseReceipt(createDTO, supply);
        warehouseReceipt.setId(getGenerationId());
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
    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
