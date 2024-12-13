package com.web.bookstore.repository.user;

import com.web.bookstore.entity.user.Role;
import com.web.bookstore.entity.user.User;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.Optional;

public interface UserRepository extends JpaRepository<User,Integer> {
    long count();
    Optional<User> findByUsername(String username);
    Page<User> findAllByRole(Role role, Pageable pageable);
     Page<User> findByUsernameContainingIgnoreCase(String search, Pageable pageable);
}
