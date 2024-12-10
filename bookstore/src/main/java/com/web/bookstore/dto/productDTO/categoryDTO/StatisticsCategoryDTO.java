package com.web.bookstore.dto.productDTO.categoryDTO;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
public class StatisticsCategoryDTO {
    private Integer id;
    private String name;
    private Integer totalBooks;
}
