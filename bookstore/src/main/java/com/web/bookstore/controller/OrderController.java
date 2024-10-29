package com.web.bookstore.controller;

import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersCreateDTO;
import com.web.bookstore.dto.orderDTO.ordersDTO.OrdersDTO;
import com.web.bookstore.service.orders.OrdersService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/v1/orders")
public class OrderController {

    @Autowired
    private OrdersService ordersService;

    // Retrieve all orders for a specific user
    @GetMapping("/user")
    public ResponseEntity<List<OrdersDTO>> findAllOrdersByUser(@RequestParam Integer idUser) {
        List<OrdersDTO> orders = ordersService.findAllOrdersByUser(idUser);
        return ResponseEntity.ok(orders);
    }

    // Retrieve a specific order by its ID
    @GetMapping("")
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
}
