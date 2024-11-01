package com.web.bookstore.controller;

import com.web.bookstore.dto.user.AuthenticationDTO;
import com.web.bookstore.dto.user.UserDTO;
import com.web.bookstore.dto.user.UserLoginDTO;
import com.web.bookstore.dto.user.UserRegistrationDTO;
import com.web.bookstore.service.user.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;
import org.springframework.http.HttpStatus;

@RestController
@RequestMapping("/users")
public class UserController {
    @Autowired
    private  UserService userService;


    @PreAuthorize("permitAll()")
    @PostMapping("/register")
    public ResponseEntity<UserDTO> registerUser(@RequestBody UserRegistrationDTO createUserRequest) {
        UserDTO userDTO = userService.registration(createUserRequest);
        return new ResponseEntity<>(userDTO, HttpStatus.CREATED);
    }
    @PreAuthorize("permitAll()")
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
    @GetMapping()
    public ResponseEntity<Page<UserDTO>>getRole(@RequestParam String role, @RequestParam(defaultValue = "0") int page,
                                                @RequestParam(defaultValue = "10") int size) {
        Pageable pageable = PageRequest.of(page, size);
       Page<UserDTO> userDTOS=userService.getRole(role,pageable);
        return new ResponseEntity<>(userDTOS, HttpStatus.OK);
    }
}
