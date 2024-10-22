package com.web.bookstore.entity.user;
import com.web.bookstore.entity.other.Address;
import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.userdetails.UserDetails;

import java.util.Collection;

@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class User implements UserDetails {
    @Id
    private Integer id;
    private String name;
    private String email;
    private String password;
    @ManyToOne
    @JoinColumn
    private Role role;
    @ManyToOne
    @JoinColumn
    private Address address;

    @Override
    public Collection<? extends GrantedAuthority> getAuthorities() {
        return null;
    }

    @Override
    public String getUsername() {
        return null;
    }
}
