package com.web.bookstore.service.user;

import com.web.bookstore.dto.user.AuthenticationDTO;
import com.web.bookstore.dto.user.UserDTO;
import com.web.bookstore.dto.user.UserLoginDTO;
import com.web.bookstore.dto.user.UserRegistrationDTO;
import com.web.bookstore.entity.user.Role;
import com.web.bookstore.entity.user.User;
import com.web.bookstore.exception.CustomException;
import com.web.bookstore.exception.CustomJwtException;
import com.web.bookstore.exception.Error;
import com.web.bookstore.mapper.UserMapper;
import com.web.bookstore.repository.user.UserRepository;
import com.web.bookstore.service.JwtTokenUtil;
import com.web.bookstore.service.OurUserDetailsService;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.crypto.password.PasswordEncoder;

import java.util.UUID;

public class UserServiceImpl implements UserService{
    @Autowired
    private UserService userService;
    @Autowired
    private UserMapper userMapper;
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


        UserDTO createUserResponse=userMapper.convertUserToCreateUserResponse(user);
        return createUserResponse;
    }

    @Override
    public AuthenticationDTO signIn(UserLoginDTO userDTO) {
        User user=userMapper.convertAuthenticationToUser(userDTO);

        String name = user.getUsername().trim().toLowerCase();

        // Kiểm tra xem email đã tồn tại chưa
        if (!usernameExists(name)) {
            throw new CustomJwtException(Error.USER_NOT_FOUND);
        }



        User userFind = userRepository.findByUsername(name).orElseThrow();
        if (!passwordEncoder.matches(user.getPassword(), userFind.getPassword())) {
            throw new CustomJwtException(Error.NOT_FOUND);
        }
        UserDetails userDetails=(UserDetails) userFind;

        String jwtToken=jwtTokenUtil.generateToken(userDetails);

        String refreshToken=jwtTokenUtil.generateRefreshToken(userDetails);

        return AuthenticationDTO.builder().token(jwtToken).refreshToken(refreshToken).build();
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
    private boolean usernameExists(String username) {
        return userRepository.findByUsername(username).isPresent();
    }
    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
