package com.web.bookstore.entity.order;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;


@AllArgsConstructor
@NoArgsConstructor
public enum OrderStatus {
    PENDING,
    REJECT,
    SUCCESS,
    ACCESS
}
