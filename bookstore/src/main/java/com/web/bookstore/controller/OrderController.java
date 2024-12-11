package com.web.bookstore.controller;

import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersCreateDTO;
import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersDTO;
import com.web.bookstore.service.orders.OrdersService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/orders")
public class OrderController {

    @Autowired
    private OrdersService ordersService;

    // Retrieve all orders for a specific user
    @GetMapping("/user")
    public ResponseEntity<List<OrdersDTO>> findAllOrdersByUser() {
        List<OrdersDTO> orders = ordersService.findAllOrdersByUser();
        return ResponseEntity.ok(orders);
    }

    // Retrieve a specific order by its ID
    @GetMapping("/id")
    public ResponseEntity<OrdersDTO> findById(@RequestParam Integer idOrder) {
        OrdersDTO order = ordersService.findById(idOrder);
        return ResponseEntity.ok(order);
    }

    // Create a new order
    @PostMapping
    public ResponseEntity<OrdersDTO> createOrder(@RequestBody OrdersCreateDTO ordersCreateDTO) {
        OrdersDTO createdOrder = ordersService.create(ordersCreateDTO);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdOrder);
    }
    @GetMapping()
    public ResponseEntity<Page<OrdersDTO>> findStatus(  @RequestParam(defaultValue = "0") int page,
                                                        @RequestParam(defaultValue = "10") int size,
                                                        @RequestParam String status){
        Pageable pageable = PageRequest.of(page, size);
        Page<OrdersDTO> ordersDTOS=ordersService.getStatus(pageable,status);
        return ResponseEntity.ok(ordersDTOS);
    }
    @PatchMapping
    public ResponseEntity<OrdersDTO> updateOrder(@RequestParam Integer id,@RequestParam String status) {
        OrdersDTO createdOrder = ordersService.update(id,status);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdOrder);
    }
}
