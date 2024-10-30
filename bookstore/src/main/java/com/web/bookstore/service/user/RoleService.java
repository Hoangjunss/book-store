package com.web.bookstore.service.user;

import com.web.bookstore.entity.user.Role;

public interface RoleService {
    Role findById(Integer id);
    Role findByName(String name);
}
