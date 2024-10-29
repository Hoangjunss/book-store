package com.web.bookstore.service.warehouseService;


import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailCreateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailUpdateDTO;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.warehouse.WarehouseReceipt;
import com.web.bookstore.entity.warehouse.WarehouseReceiptDetail;
import com.web.bookstore.mapper.WarehouseMapper;
import com.web.bookstore.repository.product.ProductRepository;
import com.web.bookstore.repository.warehouse.WarehouseReceiptDetailRepository;
import com.web.bookstore.repository.warehouse.WarehouseReceiptRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;

import java.util.Optional;

public class WarehouseReceiptDetailServiceImpl implements WarehouseReceiptDetailService {
    @Autowired
    private WarehouseReceiptDetailRepository warehouseReceiptDetailRepository;

    @Autowired
    private ProductRepository productRepository;

    @Autowired
    private WarehouseMapper warehouseMapper;

    @Autowired
    private WarehouseService warehouseService;
    @Autowired
    private WarehouseReceiptRepository warehouseReceiptRepository;

    @Override
    public WarehouseReceiptDetail addWarehouseReceiptDetail(WarehouseReceipt warehouseReceipt, WarehouseReceiptDetailCreateDTO detailCreateDTO) {
        Optional<Product> optionalProduct = productRepository.findById(detailCreateDTO.getIdProduct());
        if (!optionalProduct.isPresent()) {
            throw new RuntimeException("Product not found");
        }
        Product product = optionalProduct.get();

        WarehouseReceiptDetail detail = warehouseMapper.convertWarehouseReceiptDetailCreateDTOToWarehouseReceiptDetail(detailCreateDTO, product);
        detail.setWarehouseReceipt(warehouseReceipt);

        WarehouseReceiptDetail savedDetail = warehouseReceiptDetailRepository.save(detail);

        warehouseService.updateWarehouse(product, detailCreateDTO.getQuantity(), detailCreateDTO.getUnitPrice());

        return savedDetail;
    }

    @Override
    public WarehouseReceiptDetail updateWarehouseReceiptDetail(WarehouseReceipt warehouseReceipt, WarehouseReceiptDetailUpdateDTO detailUpdateDTO) {
        WarehouseReceiptDetail detail;
        if (detailUpdateDTO.getId() != null) {
            Optional<WarehouseReceiptDetail> optionalDetail = warehouseReceiptDetailRepository.findById(detailUpdateDTO.getId());
            if (!optionalDetail.isPresent()) {
                throw new RuntimeException("WarehouseReceiptDetail not found");
            }
            detail = optionalDetail.get();
        } else {
            detail = new WarehouseReceiptDetail();
            detail.setWarehouseReceipt(warehouseReceipt);
        }

        Optional<Product> optionalProduct = productRepository.findById(detailUpdateDTO.getIdProduct());
        if (!optionalProduct.isPresent()) {
            throw new RuntimeException("Product not found");
        }
        Product product = optionalProduct.get();

        detail = warehouseMapper.convertWarehouseReceiptDetailUpdateDTOToWarehouseReceiptDetail(detailUpdateDTO, product);
        detail.setWarehouseReceipt(warehouseReceipt);

        WarehouseReceiptDetail savedDetail = warehouseReceiptDetailRepository.save(detail);

        warehouseService.updateWarehouse(product, detailUpdateDTO.getQuantity(), detailUpdateDTO.getUnitPrice());

        return savedDetail;
    }
    @Override
    public Page<WarehouseReceiptDetailDTO> getList(Pageable pageable, Integer idWarehouse) {
        WarehouseReceipt warehouseReceipt=warehouseReceiptRepository.findById(idWarehouse).orElseThrow();
        // Retrieve paginated WarehouseReceiptDetail entities filtered by idWarehouse
        Page<WarehouseReceiptDetail> details = warehouseReceiptDetailRepository.findByWarehouseReceipt(warehouseReceipt, pageable);

        // Map each WarehouseReceiptDetail entity to WarehouseReceiptDetailDTO
        return details.map(warehouseMapper::convertWarehouseReceiptDetailToWarehouseReceiptDetailDTO);
    }
}
