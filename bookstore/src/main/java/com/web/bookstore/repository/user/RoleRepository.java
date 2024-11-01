package com.web.bookstore.repository.user;

import com.web.bookstore.entity.user.Role;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.Optional;

public interface RoleRepository extends JpaRepository<Role,Integer> {
    Optional<Role> findByRole(String name);
}
