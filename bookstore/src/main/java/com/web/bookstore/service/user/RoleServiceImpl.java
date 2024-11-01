package com.web.bookstore.service.user;

import com.web.bookstore.entity.user.Role;
import com.web.bookstore.repository.user.RoleRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.UUID;
@Service
public class RoleServiceImpl implements RoleService{
    @Autowired
    private RoleRepository roleRepository;

    @Override
    public Role findById(Integer id) {
        return roleRepository.findById(id).orElseThrow();
    }

    @Override
    public Role findByName(String name) {
        return roleRepository.findByRole(name).orElseThrow();
    }

    public Integer getGenerationId() {
        UUID uuid = UUID.randomUUID();
        // Use most significant bits and ensure it's within the integer range
        return (int) (uuid.getMostSignificantBits() & 0xFFFFFFFFL);
    }
}
