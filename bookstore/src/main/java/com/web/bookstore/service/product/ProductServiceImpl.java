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
import com.web.bookstore.repository.product.ProductRepository;
import com.web.bookstore.repository.user.SupplyRepository;
import com.web.bookstore.service.redis.RedisService;
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
    private RedisService redisService;
    @Autowired
    private ProductMapper productMapper;
    @Autowired
    private ImageService imageService;
    @Autowired
    private SupplyRepository supplyRepository;

    @Override
    public ProductDTO createProduct(ProductCreateDTO productDTO) {
        Image image=imageService.saveImage(productDTO.getImage());
        Supply supply=supplyRepository.findById(productDTO.getSupplyId()).orElseThrow(()->new CustomException(Error.PRODUCT_NOT_FOUND));
        Category category=new Category();
        Product product=productMapper.conventProductCreateDTOToProduct(productDTO,category,image,supply);
        product.setId(getGenerationId());

        ProductDTO productDTO1= productMapper.conventProductToProductDTO(productRepository.save(product));
        String productKey = RedisConstant.PRODUCT + productDTO1.getId();
        redisService.set(productKey, productDTO1);

        // Add the product to the list of products in Redis
        redisService.hashSet(RedisConstant.LIST_PRODUCT_All, String.valueOf(productDTO1.getId()), productDTO1);
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
        ProductDTO cachedProduct=(ProductDTO) redisService.get(RedisConstant.PRODUCT+id);

        if (cachedProduct != null) {
            // Return cached product
            return cachedProduct;
        } else {
            // Retrieve the product from the database if not in cache
            Product product = productRepository.findById(id)
                    .orElseThrow();

            // Convert the product entity to ProductDTO
            ProductDTO productDTO = productMapper.conventProductToProductDTO(product);

            // Cache the ProductDTO in Redis
            redisService.set(RedisConstant.PRODUCT + id, productDTO);

            return productDTO;
        }
    }
    @Autowired
    public Page<ProductDTO> getAll(Pageable pageable) {
        List<ProductDTO> cachedProducts = redisService.hashGetAll(RedisConstant.LIST_PRODUCT_All, ProductDTO.class);

        if (!cachedProducts.isEmpty()) {
            // Return cached data as a Page object
            return new PageImpl<>(cachedProducts, pageable, cachedProducts.size());
        } else {
            // Retrieve paginated Product entities from the database
            Page<Product> products = productRepository.findAll(pageable);

            // Map each Product entity to ProductDTO
            Page<ProductDTO> productDTOPage = products.map(productMapper::conventProductToProductDTO);

            // Store the retrieved ProductDTOs in Redis
            productDTOPage.forEach(productDTO -> {
                        redisService.hashSet(RedisConstant.LIST_PRODUCT_All, String.valueOf(productDTO.getId()), productDTO);
                        if (!redisService.exists(RedisConstant.PRODUCT + productDTO.getId())) {
                            redisService.set(RedisConstant.PRODUCT + productDTO.getId(), productDTO);
                        }
                    }
            );

            // Optionally, set expiration time for caching
            redisService.setTimeToLive(RedisConstant.LIST_PRODUCT_All, 1); // Set TTL as needed

            return productDTOPage;
        }
    }

    @Override
    public Page<ProductDTO> getAllByCategory(Pageable pageable, Integer id) {
        return null;
    }

    @Override
    public Page<ProductDTO> getAllSupply(Pageable pageable, Integer integer) {
        Supply supply = supplyRepository.findById(integer).orElseThrow();

        List<ProductDTO> cachedProducts = redisService.hashGetAll(RedisConstant.LIST_PRODUCT_All_SUPPLY+supply.getId(), ProductDTO.class);

        if (!cachedProducts.isEmpty()) {
            // Return cached data as a Page object
            return new PageImpl<>(cachedProducts, pageable, cachedProducts.size());
        } else {
            // Retrieve paginated Product entities from the database
            Page<Product> products = productRepository.findAllBySupply(pageable, supply);

            // Map each Product entity to ProductDTO
            Page<ProductDTO> productDTOPage = products.map(productMapper::conventProductToProductDTO);

            // Store the retrieved ProductDTOs in Redis
            productDTOPage.forEach(productDTO -> {
                        redisService.hashSet(RedisConstant.LIST_PRODUCT_All, String.valueOf(productDTO.getId()), productDTO);
                if (!redisService.exists(RedisConstant.PRODUCT + productDTO.getId())) {
                    redisService.set(RedisConstant.PRODUCT + productDTO.getId(), productDTO);
                }
                    }
            );

            // Optionally, set expiration time for caching
            redisService.setTimeToLive(RedisConstant.LIST_PRODUCT_All_SUPPLY+supply.getId(), 1); // Set TTL as needed

            return productDTOPage;
        }
    }

    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
