package com.web.bookstore.config;

import org.modelmapper.ModelMapper;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.CorsRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;
@Configuration
public class WebConfig implements WebMvcConfigurer {
    @Bean
    public ModelMapper modelMapper() {
        return new ModelMapper();
    }

    @Override
    public void addCorsMappings(CorsRegistry registry) {
        registry.addMapping("/**")  // Áp dụng cho tất cả các đường dẫn
                .allowedOrigins("http://localhost:8000")  // Chỉ chấp nhận từ localhost:8000
                .allowedMethods("GET", "PATCH", "POST", "PUT", "DELETE", "OPTIONS")
                .allowedHeaders("Authorization", "Content-Type")
                .allowCredentials(true)  // Đặt thành true để cho phép gửi credentials
                .maxAge(3600);
    }
}
