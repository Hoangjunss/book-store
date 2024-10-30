package com.web.bookstore.controller;

import com.web.bookstore.dto.user.AuthenticationDTO;
import com.web.bookstore.dto.user.UserDTO;
import com.web.bookstore.dto.user.UserLoginDTO;
import com.web.bookstore.dto.user.UserRegistrationDTO;
import com.web.bookstore.service.user.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import org.springframework.http.HttpStatus;

@RestController
@RequestMapping("/api/users")
public class UserController {
    @Autowired
    private  UserService userService;



    @PostMapping("/register")
    public ResponseEntity<UserDTO> registerUser(@RequestBody UserRegistrationDTO createUserRequest) {
        UserDTO userDTO = userService.registration(createUserRequest);
        return new ResponseEntity<>(userDTO, HttpStatus.CREATED);
    }

    @PostMapping("/signin")
    public ResponseEntity<AuthenticationDTO> signIn(@RequestBody UserLoginDTO user) {
        AuthenticationDTO authDTO = userService.signIn(user);
        return new ResponseEntity<>(authDTO, HttpStatus.OK);
    }

    @PostMapping("/refresh-token")
    public ResponseEntity<AuthenticationDTO> refreshToken(@RequestParam String token) {
        AuthenticationDTO authDTO = userService.generateRefreshToken(token);
        return new ResponseEntity<>(authDTO, HttpStatus.OK);
    }
}
