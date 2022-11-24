package com.nt.rookies.b6g3backend.services;

import com.nt.rookies.b6g3backend.dtos.UserDto;
import com.nt.rookies.b6g3backend.entities.UserEntity;
import com.nt.rookies.b6g3backend.exceptions.NotFoundException;
import com.nt.rookies.b6g3backend.mappers.UserMapper;
import com.nt.rookies.b6g3backend.repositories.UserRepository;
import com.nt.rookies.b6g3backend.security.UserDetailsImpl;
import org.springframework.security.access.AccessDeniedException;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Service;

import java.util.Objects;
import java.util.Optional;

@Service
public class UserService {

    private UserRepository repository;

    public UserService(UserRepository repository) {
        this.repository = repository;
    }
    public UserDto edit(UserDto user, String username) {
        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();

        if (Objects.isNull(authentication)) {
            throw new AccessDeniedException("Forbidden");
        }

        UserDetailsImpl userDetails = (UserDetailsImpl) authentication.getPrincipal();
        UserEntity userEntity = this.repository.findByUsernameAndLocation(username, userDetails.getLocationEntity());
        userEntity.setDob(user.getDob());
        userEntity.setGender(user.getGender());

        if(user.getJointDate().isAfter(user.getDob())) {
            userEntity.setJointDate(user.getJointDate());
        }else{
            System.out.println("Joint > dob");
        }

        userEntity.setType(user.getType());
        try{
            return UserMapper.toDto(repository.save(userEntity));
        }catch(NullPointerException e) {
            throw Objects.nonNull(e.getMessage()) ? new NotFoundException(e.getMessage()) : new NotFoundException(e);
        }
    }

    public UserDto getByUsername(String username) {
        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();

        if (Objects.isNull(authentication)) {
            throw new AccessDeniedException("Forbidden");
        }

        UserDetailsImpl userDetails = (UserDetailsImpl) authentication.getPrincipal();
        Optional<UserEntity> response = this.repository.findByUsernameAndLocations(username, userDetails.getLocationEntity());
        if (response.isPresent()) {
            return UserMapper.toDto(response);
        } else {
            return null;
        }
    }
}
