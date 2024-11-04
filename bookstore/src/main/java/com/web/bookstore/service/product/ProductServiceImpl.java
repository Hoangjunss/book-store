package com.web.bookstore.service.product;

import com.web.bookstore.dto.productDTO.productDTO.ProductCreateDTO;
import com.web.bookstore.dto.productDTO.productDTO.ProductDTO;
import com.web.bookstore.entity.product.Category;
import com.web.bookstore.entity.product.Image;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.user.Supply;

import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.ProductMapper;
import com.web.bookstore.repository.product.ProductRepository;
import com.web.bookstore.repository.user.SupplyRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.stereotype.Service;

import java.util.UUID;

@Service
public class ProductServiceImpl implements ProductService {
    @Autowired
    private ProductRepository productRepository;
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

        return productMapper.conventProductToProductDTO(productRepository.save(product));
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
        Product product = productRepository.findById(id)
                .orElseThrow();

        return productMapper.conventProductToProductDTO(product);
    }
    public Page<ProductDTO> getAll(Pageable pageable) {
        // Retrieve paginated Product entities
        Page<Product> products = productRepository.findAll(pageable);

        // Map each Product entity to ProductDTO and return as a Page
        return products.map(productMapper::conventProductToProductDTO);
    }

    @Override
    public Page<ProductDTO> getAllByCategory(Pageable pageable, Integer id) {
        return null;
    }

    @Override
    public Page<ProductDTO> getAllSupply(Pageable pageable, Integer integer) {
       Supply supply=supplyRepository.findById(integer).orElseThrow();
        Page<Product> products = productRepository.findAllBySupply(pageable,supply);

        // Map each Product entity to ProductDTO and return as a Page
        return products.map(productMapper::conventProductToProductDTO);
    }

    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
