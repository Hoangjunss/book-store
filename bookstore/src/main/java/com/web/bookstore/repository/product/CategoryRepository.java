package com.web.bookstore.repository.product;

import com.web.bookstore.entity.product.Category;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface CategoryRepository extends JpaRepository<Category,Integer> {
    @Query("SELECT c.id as id, c.name as name, COUNT(p) as totalBooks " +
            "FROM Category c LEFT JOIN Product p ON p.category = c " +
            "GROUP BY c.id, c.name")
    List<CategoryStatistics> getCategoryStatistics();

    @Query("SELECT COUNT(p) FROM Product p WHERE p.category.id = :categoryId")
    Long countProductsByCategoryId(Integer categoryId);

    @Query("SELECT c.id as id, c.name as name, COUNT(p) as totalBooks " +
            "FROM Category c LEFT JOIN Product p ON p.category = c " +
            "WHERE LOWER(c.name) LIKE LOWER(CONCAT('%', :name, '%')) " +
            "GROUP BY c.id, c.name")
    List<CategoryStatistics> searchCategoryByName(String name);
}
