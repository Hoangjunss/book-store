package com.web.bookstore.repository.product;

import com.web.bookstore.entity.product.Image;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ImageRepository extends JpaRepository<Image,Integer> {
}
