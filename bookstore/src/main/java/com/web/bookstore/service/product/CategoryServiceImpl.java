package com.web.bookstore.service.product;

import com.web.bookstore.dto.productDTO.categoryDTO.CategoryCreateDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.CategoryDTO;
import com.web.bookstore.entity.product.Category;
import com.web.bookstore.repository.product.CategoryRepository;
import jakarta.persistence.criteria.CriteriaBuilder;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.UUID;
import java.util.stream.Collectors;
@Service
public class CategoryServiceImpl implements CategorySercive{
    @Autowired
    private CategoryRepository categoryRepository;
    @Autowired
    private ModelMapper mapper;
    @Override
    public List<CategoryDTO> getAll() {
        return categoryRepository.findAll().stream().map(category -> mapper.map(category,CategoryDTO.class)).collect(Collectors.toList());
    }

    @Override
    public CategoryDTO getId(Integer id) {
        Category category=categoryRepository.findById(id).orElseThrow();
        return mapper.map(category,CategoryDTO.class);
    }

    @Override
    public CategoryDTO create(CategoryCreateDTO categoryCreateDTO) {
        Category category=mapper.map(categoryCreateDTO,Category.class);
        category.setId(getGenerationId());
        return mapper.map(categoryRepository.save(category),CategoryDTO.class);
    }
    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
