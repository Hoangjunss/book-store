package com.web.bookstore.service.product;

import com.web.bookstore.dto.productDTO.productDTO.ProductCreateDTO;
import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;
import com.web.bookstore.entity.RedisConstant;
import com.web.bookstore.entity.product.Category;
import com.web.bookstore.entity.product.Image;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.user.Supply;

import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.ProductMapper;
import com.web.bookstore.mapper.SupplyMapper;
import com.web.bookstore.repository.product.CategoryRepository;
import com.web.bookstore.repository.product.ProductRepository;
import com.web.bookstore.repository.user.SupplyRepository;
import com.web.bookstore.service.redis.RedisService;
import com.web.bookstore.service.supply.SupplyService;
import jakarta.transaction.Transactional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageImpl;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.domain.Specification;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Objects;
import java.util.UUID;


@Service
public class ProductServiceImpl implements ProductService {
    @Autowired
    private ProductRepository productRepository;

    @Autowired
    private ProductMapper productMapper;
    @Autowired
    private CategoryRepository categoryRepository;
    @Autowired
    private ImageService imageService;
    @Autowired
    private SupplyService supplyService;
    @Autowired
    private SupplyMapper supplyMapper;
    @Override
    public Page<ProductDTO> searchProducts(String name, String author, Integer categoryId,
                                           Double minPrice, Double maxPrice, Pageable pageable) {
        Specification<Product> specification = Specification.where((root, query, criteriaBuilder) ->
                criteriaBuilder.equal(root.get("status"), true)
        );

        if (name != null) {
            specification = specification.and((root, query, criteriaBuilder) -> criteriaBuilder.like(root.get("name"), "%" + name + "%"));
        }
        if (author != null) {
            specification = specification.and((root, query, criteriaBuilder) -> criteriaBuilder.like(root.get("author"), "%" + author + "%"));
        }
        if (categoryId != null) {
            specification = specification.and((root, query, criteriaBuilder) -> criteriaBuilder.equal(root.get("category").get("id"), categoryId));
        }
        if (minPrice != null && maxPrice != null) {
            specification = specification.and((root, query, criteriaBuilder) ->
                    criteriaBuilder.between(root.get("price"), minPrice, maxPrice));
        } else if (minPrice != null) {
            specification = specification.and((root, query, criteriaBuilder) ->
                    criteriaBuilder.greaterThanOrEqualTo(root.get("price"), minPrice));
        } else if (maxPrice != null) {
            specification = specification.and((root, query, criteriaBuilder) ->
                    criteriaBuilder.lessThanOrEqualTo(root.get("price"), maxPrice));
        }

        Page<Product> products = productRepository.findAll(specification, pageable);
        return products.map(productMapper::conventProductToProductDTO);
    }

    @Override
    public ProductDTO createProduct(ProductCreateDTO productDTO) {
        Image image=imageService.saveImage(productDTO.getImage());
        Supply supply=supplyMapper.conventSupplyDTOToSupply(supplyService.findById(productDTO.getSupplyId()));
        Category category= categoryRepository.findById(productDTO.getCategoryId()).orElseThrow();

        Product product=productMapper.conventProductCreateDTOToProduct(productDTO);
        product.setId(getGenerationId());
        product.setCategory(category);
        product.setImage(image);
        product.setSupply(supply);

        ProductDTO productDTO1= productMapper.conventProductToProductDTO(productRepository.save(product));
        String productKey = RedisConstant.PRODUCT + productDTO1.getId();

        return productDTO1;
    }

    @Override
    @Transactional
    public ProductDTO updateProduct(ProductCreateDTO productDTO) {
        // Retrieve the existing product
        Product existingProduct = productRepository.findById(productDTO.getId())
                .orElseThrow(() -> new RuntimeException("Product not found"));

        // Update Category if changed
        if (!existingProduct.getCategory().getId().equals(productDTO.getCategoryId())) {
            Category newCategory = categoryRepository.findById(productDTO.getCategoryId())
                    .orElseThrow(() -> new RuntimeException("Category not found"));
            existingProduct.setCategory(newCategory);
        }

        // Update Supply if changed
        if (!existingProduct.getSupply().getId().equals(productDTO.getSupplyId())) {
            Supply newSupply=supplyMapper.conventSupplyDTOToSupply(supplyService.findById(productDTO.getSupplyId()));
            existingProduct.setSupply(newSupply);
        }

        // Update Image if provided
        if (productDTO.getImage() != null && !productDTO.getImage().isEmpty()) {
            Image image = imageService.saveImage(productDTO.getImage());
            existingProduct.setImage(image);
        }

        // Update other product attributes
        if (!existingProduct.getName().equals(productDTO.getName())) {
            existingProduct.setName(productDTO.getName());
        }

        if (!existingProduct.getDescription().equals(productDTO.getDescription())) {
            existingProduct.setDescription(productDTO.getDescription());
        }

        if (!existingProduct.getAuthor().equals(productDTO.getAuthor())) {
            existingProduct.setAuthor(productDTO.getAuthor());
        }

        if (!existingProduct.getPage().equals(productDTO.getPage())) {
            existingProduct.setPage(productDTO.getPage());
        }

        if (!Objects.equals(existingProduct.getSize(), productDTO.getSize())) {
            existingProduct.setSize(productDTO.getSize());
        }

        if (!Objects.equals(existingProduct.getStatus(), productDTO.getStatus())) {
            existingProduct.setStatus(productDTO.getStatus());
        }

        if (!Objects.equals(existingProduct.getQuantity(), productDTO.getQuantity())) {
            existingProduct.setQuantity(productDTO.getQuantity());
        }

        if (!Objects.equals(existingProduct.getPrice(), productDTO.getPrice())) {
            existingProduct.setPrice(productDTO.getPrice());
        }

        // Save the updated product
        existingProduct = productRepository.save(existingProduct);

        return productMapper.conventProductToProductDTO(existingProduct);
    }



    @Override
    public void deleteProduct(Integer id) {
        Product existingProduct = productRepository.findById(id)
                .orElseThrow();
        existingProduct.setStatus(false);
         productRepository.save(existingProduct);

    }

    @Override
    public ProductDTO findById(Integer id) {

            // Retrieve the product from the database if not in cache
            Product product = productRepository.findById(id)
                    .orElseThrow();

            // Convert the product entity to ProductDTO
            ProductDTO productDTO = productMapper.conventProductToProductDTO(product);

            // Cache the ProductDTO in Redis


            return productDTO;

    }
    @Override
    public Page<ProductDTO> getAll(Pageable pageable) {

            // Retrieve paginated Product entities from the database
            Page<Product> products = productRepository.findAll(pageable);

            // Map each Product entity to ProductDTO
            Page<ProductDTO> productDTOPage = products.map(productMapper::conventProductToProductDTO);

            // Store the retrieved ProductDTOs in Redis

            return productDTOPage;

    }

    @Override
    public Page<ProductDTO> getAllByCategory(Pageable pageable, Integer id) {
        Category category=categoryRepository.findById(id).orElseThrow();
        Page<Product> products=productRepository.findAllByCategory(pageable,category);
        return products.map(productMapper::conventProductToProductDTO);
    }

    @Override
    public Page<ProductDTO> getAllSupply(Pageable pageable, Integer integer) {
        Supply supply = supplyMapper.conventSupplyDTOToSupply(supplyService.findById(integer));


            // Retrieve paginated Product entities from the database
            Page<Product> products = productRepository.findAllBySupply(pageable, supply);

            // Map each Product entity to ProductDTO
            Page<ProductDTO> productDTOPage = products.map(productMapper::conventProductToProductDTO);

            // Store the retrieved ProductDTOs in Redis


            return productDTOPage;

    }

    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
