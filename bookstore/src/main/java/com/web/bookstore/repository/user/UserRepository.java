package com.web.bookstore.repository.user;

import com.web.bookstore.entity.user.User;
import org.springframework.data.jpa.repository.JpaRepository;

public interface UserRepository extends JpaRepository<User,Integer> {
}
