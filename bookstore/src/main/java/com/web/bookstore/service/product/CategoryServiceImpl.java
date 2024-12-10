package com.web.bookstore.service.product;

import com.web.bookstore.dto.productDTO.categoryDTO.CategoryCreateDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.CategoryDTO;
import com.web.bookstore.dto.productDTO.categoryDTO.StatisticsCategoryDTO;
import com.web.bookstore.entity.product.Category;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.repository.product.CategoryRepository;
import com.web.bookstore.repository.product.CategoryStatistics;
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

    @Override
    public List<StatisticsCategoryDTO> getAllCategory() {
        List<CategoryStatistics> stats = categoryRepository.getCategoryStatistics();

        return stats.stream()
                .map(stat -> StatisticsCategoryDTO.builder()
                        .id(stat.getId())
                        .name(stat.getName())
                        .totalBooks(stat.getTotalBooks().intValue()) // Chuyển từ Long sang Integer
                        .build())
                .collect(Collectors.toList());
    }

    @Override
    public void deleteCategoryById(Integer categoryId) {
        // Kiểm tra xem category có tồn tại không
        boolean exists = categoryRepository.existsById(categoryId);
        if (!exists) {
            throw new CustomException(Error.CATEGORY_NOT_FOUND);
        }

        // Đếm số lượng sản phẩm liên kết với category
        Long productCount = categoryRepository.countProductsByCategoryId(categoryId);

        if (productCount != null && productCount > 0) {
            throw new CustomException(Error.CATEGORY_UNABLE_DELETE);
        }

        // Nếu không có sản phẩm nào liên kết, tiến hành xóa
        categoryRepository.deleteById(categoryId);
    }

    @Override
    public List<StatisticsCategoryDTO> searchCategoryByName(String name) {
        List<CategoryStatistics> stats = categoryRepository.searchCategoryByName(name);

        return stats.stream()
                .map(stat -> StatisticsCategoryDTO.builder()
                        .id(stat.getId())
                        .name(stat.getName())
                        .totalBooks(stat.getTotalBooks().intValue())
                        .build())
                .collect(Collectors.toList());
    }

    @Override
    public CategoryDTO findById(Integer id) {
        return null;
    }

    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
