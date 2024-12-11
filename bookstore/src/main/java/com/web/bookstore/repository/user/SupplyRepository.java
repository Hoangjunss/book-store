package com.web.bookstore.repository.user;

import com.web.bookstore.entity.user.Supply;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;
import java.util.Optional;

public interface SupplyRepository extends JpaRepository<Supply,Integer> {
    Optional<Supply> findByName(String name);
    List<Supply> findByNameContaining(String name);

}
