package com.web.bookstore.service.product;

import com.web.bookstore.entity.product.Image;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

@Service
public interface ImageService {
    Image saveImage(MultipartFile file);
}
