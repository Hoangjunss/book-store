package com.web.bookstore.service.user;

import com.web.bookstore.dto.user.AuthenticationDTO;
import com.web.bookstore.dto.user.UserDTO;
import com.web.bookstore.dto.user.UserLoginDTO;
import com.web.bookstore.dto.user.UserRegistrationDTO;
import org.springframework.security.core.userdetails.UserDetails;

public interface UserService {
    UserDTO registration(UserRegistrationDTO createUserRequest);
    AuthenticationDTO signIn(UserLoginDTO user);
    AuthenticationDTO generateRefreshToken(String token);
}