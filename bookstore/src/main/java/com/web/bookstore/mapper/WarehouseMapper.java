package com.web.bookstore.mapper;

import com.web.bookstore.dto.warehouseDTO.warehouseDTO.WarehouseCreateDTO;
import com.web.bookstore.dto.warehouseDTO.warehouseDTO.WarehouseDTO;
import com.web.bookstore.dto.warehouseDTO.warehouseDTO.WarehouseUpdateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WareHouseReceiptCreateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WarehouseReceiptDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptDTO.WarehouseReceiptUpdateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailCreateDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailDTO;
import com.web.bookstore.dto.warehouseDTO.warehousereceiptdetailDTO.WarehouseReceiptDetailUpdateDTO;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.user.Supply;
import com.web.bookstore.entity.warehouse.Warehouse;
import com.web.bookstore.entity.warehouse.WarehouseReceipt;
import com.web.bookstore.entity.warehouse.WarehouseReceiptDetail;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;

@Component
public class WarehouseMapper {
    @Autowired
    private ModelMapper mapper;
    public Warehouse conventWarehouseCreateDTOToWarehouse(WarehouseCreateDTO warehouseCreateDTO, Product product){
        Warehouse warehouse=mapper.map(warehouseCreateDTO,Warehouse.class);
        warehouse.setProduct(product);
        return  warehouse;
    }
    public Warehouse conventWarehouseDTOToWarehouse(WarehouseUpdateDTO warehouseUpdateDTO, Product product){
          Warehouse warehouse=mapper.map(warehouseUpdateDTO,Warehouse.class);
          warehouse.setProduct(product);
          return warehouse;
    }
    public WarehouseDTO conventWarehouseToWarehouseDTO(Warehouse warehouse){
        WarehouseDTO warehouseDTO=mapper.map(warehouse,WarehouseDTO.class);
        warehouseDTO.setProductName(warehouse.getProduct().getName());
        return warehouseDTO;
    }
    public WarehouseReceipt convertWarehouseReceiptCreateDTOToWarehouseReceipt(WareHouseReceiptCreateDTO warehouseReceiptCreateDTO, Supply supply) {
        WarehouseReceipt warehouseReceipt = mapper.map(warehouseReceiptCreateDTO, WarehouseReceipt.class);
        warehouseReceipt.setSupply(supply);
        return warehouseReceipt;
    }
    public WarehouseReceipt convertWarehouseReceiptUpdateDTOToWarehouseReceipt(WarehouseReceiptUpdateDTO warehouseReceiptUpdateDTO, Supply supply) {
        WarehouseReceipt warehouseReceipt = mapper.map(warehouseReceiptUpdateDTO, WarehouseReceipt.class);
        warehouseReceipt.setSupply(supply);
        return warehouseReceipt;
    }
    public WarehouseReceiptDTO convertWarehouseReceiptToWarehouseReceiptDTO(WarehouseReceipt warehouseReceipt, List<WarehouseReceiptDetail> warehouseReceiptDetails) {
        WarehouseReceiptDTO warehouseReceiptDTO = mapper.map(warehouseReceipt, WarehouseReceiptDTO.class);
        warehouseReceiptDTO.setSupplyName(warehouseReceipt.getSupply().getName());
        List<WarehouseReceiptDetailDTO>  warehouseReceiptDetailDTOS= warehouseReceiptDetails.stream().map(this::convertWarehouseReceiptDetailToWarehouseReceiptDetailDTO).collect(Collectors.toList());
        warehouseReceiptDTO.setWareHouseReceiptDetailDTOS(warehouseReceiptDetailDTOS);
        return warehouseReceiptDTO;
    }
    public WarehouseReceiptDetail convertWarehouseReceiptDetailCreateDTOToWarehouseReceiptDetail(WarehouseReceiptDetailCreateDTO warehouseReceiptDetailCreateDTO, Product product) {
        WarehouseReceiptDetail warehouseReceiptDetail = mapper.map(warehouseReceiptDetailCreateDTO, WarehouseReceiptDetail.class);
        warehouseReceiptDetail.setProduct(product);
        return warehouseReceiptDetail;
    }
    public WarehouseReceiptDetail convertWarehouseReceiptDetailUpdateDTOToWarehouseReceiptDetail(WarehouseReceiptDetailUpdateDTO warehouseReceiptDetailUpdateDTO, Product product) {
        WarehouseReceiptDetail warehouseReceiptDetail = mapper.map(warehouseReceiptDetailUpdateDTO, WarehouseReceiptDetail.class);
        warehouseReceiptDetail.setProduct(product);
        return warehouseReceiptDetail;
    }
    public WarehouseReceiptDetailDTO convertWarehouseReceiptDetailToWarehouseReceiptDetailDTO(WarehouseReceiptDetail warehouseReceiptDetail) {
        WarehouseReceiptDetailDTO warehouseReceiptDetailDTO = mapper.map(warehouseReceiptDetail, WarehouseReceiptDetailDTO.class);
        warehouseReceiptDetailDTO.setProductName(warehouseReceiptDetail.getProduct().getName());
        return warehouseReceiptDetailDTO;
    }

}
