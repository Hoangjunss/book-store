package com.web.bookstore.controller;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

@Data
@AllArgsConstructor
@NoArgsConstructor
@ToString
public class Order {
    private Integer id;

    private double price;
    private String currency;
    private String method;
    private String intent;
    private String description;

}