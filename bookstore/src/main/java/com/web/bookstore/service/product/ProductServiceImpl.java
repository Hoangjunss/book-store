package com.web.bookstore.service.product;

import com.web.bookstore.dto.product.ProductCreateDTO;
import com.web.bookstore.dto.product.ProductDTO;
import com.web.bookstore.entity.product.Category;
import com.web.bookstore.entity.product.Image;
import com.web.bookstore.entity.product.Product;
import com.web.bookstore.entity.user.Supply;

import com.web.bookstore.mapper.ProductMapper;
import com.web.bookstore.repository.product.ProductRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class ProductServiceImpl implements ProductService {
    @Autowired
    private ProductRepository productRepository;
    @Autowired
    private ProductMapper productMapper;
    @Autowired
    private CategoryService categoryService;

    @Override
    public ProductDTO createProduct(ProductCreateDTO productDTO) {
        Image image=new Image();
        Supply supply=new Supply();
        Category category=categoryService.findById(productDTO.getCategoryId());
        Product product=productMapper.conventProductCreateDTOToProduct(productDTO,category,image,supply);

        return productMapper.conventProductToProductDTO(productRepository.save(product));
    }

    @Override
    public ProductDTO updateProduct(ProductCreateDTO productDTO) {
        Product existingProduct = productRepository.findById(productDTO.getId())
                .orElseThrow();

        // Tạo các thực thể mới hoặc lấy từ repository (nếu cần)
        Category category=categoryService.findById(productDTO.getCategoryId());
        Image image =new Image();
        Supply supply=new Supply();

        // Cập nhật sản phẩm
        Product updatedProduct = productMapper.conventProductCreateDTOToProduct(productDTO, category, image, supply);

        return productMapper.conventProductToProductDTO(productRepository.save(updatedProduct));
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
}
