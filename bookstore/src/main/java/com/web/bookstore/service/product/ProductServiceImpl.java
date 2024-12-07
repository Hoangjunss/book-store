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
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageImpl;
import org.springframework.data.domain.Pageable;
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
    public ProductDTO updateProduct(ProductCreateDTO productDTO) {
        // Retrieve the existing product
        Product existingProduct = productRepository.findById(productDTO.getId())
                .orElseThrow(() -> new RuntimeException("Product not found"));

        // Flag to check if any changes have been made


        // Check and update category if different
        if (!existingProduct.getCategory().getId().equals(productDTO.getCategoryId())) {
            existingProduct.getCategory().setId(productDTO.getCategoryId());

        }

        // Check and update image if different
        if (productDTO.getImage()!=null) {
            Image image=imageService.saveImage(productDTO.getImage());
            existingProduct.setImage(image);

        }

        // Check and update supply if different
        if (!existingProduct.getSupply().getId().equals(productDTO.getSupplyId())) {
            existingProduct.getSupply().setId(productDTO.getSupplyId());

        }

        // Check and update other product attributes
        if (!existingProduct.getName().equals(productDTO.getName())) {
            existingProduct.setName(productDTO.getName());

        }

        if (!existingProduct.getDescription().equals(productDTO.getDescription())) {
            existingProduct.setDescription(productDTO.getDescription());

        }

        // Save only if changes are detected

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
