package com.web.bookstore.mapper;

import com.web.bookstore.dto.user.UserDTO;
import com.web.bookstore.dto.user.UserLoginDTO;
import com.web.bookstore.dto.user.UserRegistrationDTO;
import com.web.bookstore.entity.user.Role;
import com.web.bookstore.entity.user.User;
import org.modelmapper.ModelMapper;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class UserMapper {
    @Autowired
    private ModelMapper modelMapper;
    public User convertUserRegistrationDTOToUser(UserRegistrationDTO createUserRequest, Role role){
        User user= User.builder()
                .email(createUserRequest.getEmail())
                .fullname(createUserRequest.getFullname())
                .password(createUserRequest.getPassword())
                .username(createUserRequest.getUsername())
                .role(role).build();
        return user;
    }
    public UserDTO convertUserToCreateUserResponse(User user){
       UserDTO createUserResponse= UserDTO.builder()
               .id(user.getId())
               .email(user.getEmail())
               .fullname(user.getFullname())
               .username(user.getUsername())
               .role(user.getRole().getRole())
               .build();
        return createUserResponse;
    }
    public User convertAuthenticationToUser(UserLoginDTO authenticationRequest){
       User user= User.builder()
               .username(authenticationRequest.getName())
               .password(authenticationRequest.getPassword())
               .build();
        return user;
    }
}
