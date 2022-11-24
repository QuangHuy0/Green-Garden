package com.nt.rookies.b6g3backend.services;

import com.nt.rookies.b6g3backend.entities.UserEntity;
import com.nt.rookies.b6g3backend.exceptions.NotFoundException;
import com.nt.rookies.b6g3backend.repositories.UserRepository;
import com.nt.rookies.b6g3backend.security.UserDetailsImpl;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;

@Service
public class UserDetailsServiceImpl implements UserDetailsService {
    private UserRepository userRepository;

    public UserDetailsServiceImpl(UserRepository userRepository) {
        this.userRepository = userRepository;
    }

    @Override
    public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
        UserEntity userEntity = userRepository
                .findById(username)
                .orElseThrow(() -> new NotFoundException("Cannot find user with username = " + username));

        return UserDetailsImpl.build(userEntity);
    }
}
