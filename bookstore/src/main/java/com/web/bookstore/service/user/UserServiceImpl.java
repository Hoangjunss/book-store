package com.web.bookstore.service.user;

import com.web.bookstore.dto.user.AuthenticationDTO;
import com.web.bookstore.dto.user.UserDTO;
import com.web.bookstore.dto.user.UserLoginDTO;
import com.web.bookstore.dto.user.UserRegistrationDTO;
import com.web.bookstore.entity.RedisConstant;
import com.web.bookstore.entity.user.Role;
import com.web.bookstore.entity.user.User;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.CustomJwtException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.UserMapper;
import com.web.bookstore.repository.user.UserRepository;
import com.web.bookstore.service.JwtTokenUtil;
import com.web.bookstore.service.OurUserDetailsService;
import com.web.bookstore.service.cart.CartService;
import com.web.bookstore.service.redis.RedisService;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageImpl;
import org.springframework.data.domain.Pageable;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.UUID;
@Service

public class UserServiceImpl implements UserService{

    @Autowired
    private UserMapper userMapper;
    @Autowired
    private RedisService redisService;
    @Autowired
    private JwtTokenUtil jwtTokenUtil;
    @Autowired
    private RoleService roleService;
    @Autowired
    private UserRepository userRepository;
    @Autowired
    private PasswordEncoder passwordEncoder;
    @Autowired
    private ModelMapper modelMapper;
    @Autowired
    private CartService cartService;

    @Autowired
    private OurUserDetailsService ourUserDetailsService;

    @Override
    public UserDTO registration(UserRegistrationDTO createUserRequest) {
        Role role=roleService.findByName(createUserRequest.getRole());

        User user=userMapper.convertUserRegistrationDTOToUser(createUserRequest,role);
        if(usernameExists(user.getUsername())){
            throw new CustomException(Error.USER_ALREADY_EXISTS);
        }
        user.setId(getGenerationId());
        user.setPassword(passwordEncoder.encode(user.getPassword()));



        user= userRepository.save(user);
        cartService.createCart();
        redisService.set(RedisConstant.USER_ID+user.getId(),user);


        UserDTO createUserResponse=userMapper.convertUserToCreateUserResponse(user);

        return createUserResponse;
    }

    @Override
    public AuthenticationDTO signIn(UserLoginDTO userDTO) {
        String name = userDTO.getName().trim().toLowerCase();

        // Check if the user data is already cached in Redis
        User userFind = (User) redisService.get(RedisConstant.USER_EMAIL + name);

        if (userFind == null) {
            // If not cached, retrieve the user from the database
            userFind = userRepository.findByUsername(name)
                    .orElseThrow(() -> new CustomJwtException(Error.USER_NOT_FOUND));

            // Cache the retrieved user in Redis
            redisService.set(RedisConstant.USER_EMAIL + name, userFind);
            redisService.set(RedisConstant.USER_ID+userFind.getId(),userFind);
        }

        // Check if the account is locked
        if (!userFind.isAccountNonLocked()) {
            throw new CustomJwtException(Error.ACCOUNT_LOCKED);
        }

        // Verify the password
        if (!passwordEncoder.matches(userDTO.getPassword(), userFind.getPassword())) {
            throw new CustomJwtException(Error.NOT_FOUND);
        }

        // Cast the user to UserDetails for token generation
        UserDetails userDetails = (UserDetails) userFind;

        // Generate JWT and refresh tokens
        String jwtToken = jwtTokenUtil.generateToken(userDetails);
        String refreshToken = jwtTokenUtil.generateRefreshToken(userDetails);

        // Return the AuthenticationDTO with tokens
        return AuthenticationDTO.builder()
                .token(jwtToken)
                .refreshToken(refreshToken)
                .build();
    }

    @Override
    public AuthenticationDTO generateRefreshToken(String token) {
        String username = jwtTokenUtil.extractUsernameToken(token);

        // 3. Tạo refresh token mới
        UserDetails userDetails= ourUserDetailsService.loadUserByUsername(username);


        String jwtToken=jwtTokenUtil.generateToken(userDetails);
        String refreshToken=jwtTokenUtil.generateRefreshToken(userDetails);

        return  AuthenticationDTO.builder().token(jwtToken).refreshToken(refreshToken).build();
    }

    @Override
    public Page<UserDTO> getRole(String role, Pageable pageable) {
        String cacheKey = RedisConstant.USER_ROLE + role;

        // Attempt to retrieve cached users for this role from Redis
        List<UserDTO> cachedUsers = redisService.hashGetAll(cacheKey, UserDTO.class);

        if (!cachedUsers.isEmpty()) {
            // If cached data is found, return it as a Page
            return new PageImpl<>(cachedUsers, pageable, cachedUsers.size());
        }

        // If no cached data, retrieve users with the specified role from the database
        Role roleEntity = roleService.findByName(role);
        Page<User> users = userRepository.findAllByRole(roleEntity, pageable);

        // Map users to UserDTO
        Page<UserDTO> userDTOPage = users.map(userMapper::convertUserToCreateUserResponse);
        users.stream().map(user -> {
            redisService.set(RedisConstant.USER_ID+user.getId(),user);
            redisService.set(RedisConstant.USER_EMAIL+user.getUsername(),user);
        });
        // Cache each UserDTO in Redis under the role-based cache key
        userDTOPage.forEach(userDTO ->
                redisService.hashSet(cacheKey, String.valueOf(userDTO.getId()), userDTO)
        );

        // Return the paginated result
        return userDTOPage;
    }

    @Override
    public void lock(Integer userId) {
        String userCacheKey = RedisConstant.USER_ID + userId;

        // Attempt to retrieve the user from Redis first
        User user = (User) redisService.get(userCacheKey);

        if (user == null) {
            // If not cached, retrieve from the database
            user = userRepository.findById(userId)
                    .orElseThrow(() -> new CustomException(Error.USER_NOT_FOUND));
        }

        // Set user as locked and save to the database
        user.setLocked(true);
        userRepository.save(user);

        // Update the Redis cache with the locked user
        redisService.set(userCacheKey, user);
        redisService.set(RedisConstant.USER_EMAIL+user.getUsername(),user);
    }

    private boolean usernameExists(String username) {
        return userRepository.findByUsername(username).isPresent();
    }
    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
