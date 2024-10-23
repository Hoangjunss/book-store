package com.web.bookstore.repository.other;


import com.web.bookstore.entity.other.Address;

import org.springframework.data.jpa.repository.JpaRepository;

public interface AddressRepository extends JpaRepository<Address,Integer> {
}
