package com.web.bookstore.config;

import org.modelmapper.ModelMapper;
import org.springframework.context.annotation.Bean;

public class WebConfig {
    @Bean
    public ModelMapper modelMapper() {
        return new ModelMapper();
    }
}
