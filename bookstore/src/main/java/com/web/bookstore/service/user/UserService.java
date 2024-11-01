package com.web.bookstore.service.user;

import com.web.bookstore.dto.user.AuthenticationDTO;
import com.web.bookstore.dto.user.UserDTO;
import com.web.bookstore.dto.user.UserLoginDTO;
import com.web.bookstore.dto.user.UserRegistrationDTO;
import com.web.bookstore.entity.user.Role;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.stereotype.Service;

@Service
public interface UserService {
    UserDTO registration(UserRegistrationDTO createUserRequest);
    AuthenticationDTO signIn(UserLoginDTO user);
    AuthenticationDTO generateRefreshToken(String token);
    Page<UserDTO> getRole(String role, Pageable pageable);
}
