package com.web.bookstore.service.product;

import com.web.bookstore.entity.product.Image;
import com.web.bookstore.repository.product.ImageRepository;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

import java.util.Map;

@Service
@Slf4j
public class ImageServiceImpls implements ImageService {
    @Autowired
    private CloudinaryService cloudinaryService;
    @Autowired
    private ImageRepository imageRepository;
    @Override
    public Image saveImage(MultipartFile imageFile) {
        log.info("Uploading image");
        Map<String, Object> resultMap = cloudinaryService.upload(imageFile);
        String imageUrl = (String) resultMap.get("url");
        Image image= Image.builder().url(imageUrl).build();
        return imageRepository.save(image);
    }


}
