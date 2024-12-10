package com.web.bookstore.service.product;

import com.web.bookstore.entity.product.Product;
import org.springframework.data.jpa.domain.Specification;

public class ProductSpecification {

    public static Specification<Product> hasCategoryId(Integer categoryId) {
        return (root, query, criteriaBuilder) -> {
            if (categoryId == null) {
                return null;
            }
            return criteriaBuilder.equal(root.get("category").get("id"), categoryId);
        };
    }

    public static Specification<Product> hasBookName(String bookName) {
        return (root, query, criteriaBuilder) -> {
            if (bookName == null || bookName.trim().isEmpty()) {
                return null;
            }
            return criteriaBuilder.like(criteriaBuilder.lower(root.get("name")), "%" + bookName.toLowerCase() + "%");
        };
    }

    public static Specification<Product> hasStatus(Boolean status) {
        return (root, query, criteriaBuilder) -> {
            if (status == null) {
                return null;
            }
            return criteriaBuilder.equal(root.get("status"), status);
        };
    }
}