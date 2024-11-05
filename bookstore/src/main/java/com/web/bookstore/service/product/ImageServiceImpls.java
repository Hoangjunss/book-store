package com.web.bookstore.service.product;

import com.web.bookstore.entity.product.Image;
import com.web.bookstore.repository.product.ImageRepository;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

import java.util.Map;
import java.util.UUID;

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
        image.setId(getGenerationId());
        return imageRepository.save(image);
    }
    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }


}
