package com.web.bookstore.service.product;

import com.web.bookstore.dto.productDTO.productDTO.ProductCreateDTO;
import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;
import com.web.bookstore.dto.productDTO.productDTO.ProductSearchCriteria;
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
    @Autowired
    private SupplyRepository supplyRepository;

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
        // Kiểm tra ID sản phẩm
        if (productDTO.getId() == null) {
            throw new CustomException(Error.PRODUCT_UNABLE_TO_UPDATE);
        }

        // Lấy sản phẩm hiện có từ cơ sở dữ liệu
        Product existingProduct = productRepository.findById(productDTO.getId())
                .orElseThrow(() -> new CustomException(Error.PRODUCT_NOT_FOUND));

        // Cập nhật Category nếu cần
        if (productDTO.getCategoryId() != null && !existingProduct.getCategory().getId().equals(productDTO.getCategoryId())) {
            Category newCategory = categoryRepository.findById(productDTO.getCategoryId())
                    .orElseThrow(() -> new CustomException(Error.CATEGORY_NOT_FOUND));
            existingProduct.setCategory(newCategory);
        }

        // Cập nhật Supply nếu cần
        if (productDTO.getSupplyId() != null && !existingProduct.getSupply().getId().equals(productDTO.getSupplyId())) {
            Supply newSupply = supplyRepository.findById(productDTO.getSupplyId())
                    .orElseThrow(() -> new CustomException(Error.SUPPLY_NOT_FOUND));
            existingProduct.setSupply(newSupply);
        }

        // Cập nhật Image nếu có
        if (productDTO.getImage() != null && !productDTO.getImage().isEmpty()) {
            Image newImage = imageService.saveImage(productDTO.getImage());
            existingProduct.setImage(newImage);
        }

        // Cập nhật các thuộc tính khác nếu cần
        if (productDTO.getName() != null && !productDTO.getName().equals(existingProduct.getName())) {
            existingProduct.setName(productDTO.getName());
        }

        if (productDTO.getDescription() != null && !productDTO.getDescription().equals(existingProduct.getDescription())) {
            existingProduct.setDescription(productDTO.getDescription());
        }

        if (productDTO.getAuthor() != null && !productDTO.getAuthor().equals(existingProduct.getAuthor())) {
            existingProduct.setAuthor(productDTO.getAuthor());
        }

        if (productDTO.getPage() != null && !productDTO.getPage().equals(existingProduct.getPage())) {
            existingProduct.setPage(productDTO.getPage());
        }

        if (productDTO.getSize() != null && !productDTO.getSize().equals(existingProduct.getSize())) {
            existingProduct.setSize(productDTO.getSize());
        }

        if (productDTO.getStatus() != null && !productDTO.getStatus().equals(existingProduct.getStatus())) {
            existingProduct.setStatus(productDTO.getStatus());
        }

        // Lưu sản phẩm đã cập nhật
        Product updatedProduct = productRepository.save(existingProduct);

        // Chuyển đổi sang DTO và trả về
        return productMapper.conventProductToProductDTO(updatedProduct);
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

    @Override
    public Page<ProductDTO> searchProducts(ProductSearchCriteria criteria, Pageable pageable) {
        Specification<Product> spec = Specification.where(ProductSpecification.hasCategoryId(criteria.getCategoryId()))
                .and(ProductSpecification.hasBookName(criteria.getBookName()))
                .and(ProductSpecification.hasStatus(criteria.getStatus()));

        Page<Product> products = productRepository.findAll(spec, pageable);
        return products.map(productMapper::conventProductToProductDTO);
    }

    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
