package com.nt.rookies.b6g3backend.services;

import com.nt.rookies.b6g3backend.dtos.UserDto;
import com.nt.rookies.b6g3backend.entities.LocationEntity;
import com.nt.rookies.b6g3backend.entities.UserEntity;
import com.nt.rookies.b6g3backend.mappers.UserMapper;
import com.nt.rookies.b6g3backend.repositories.UserRepository;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.extension.ExtendWith;
import org.mockito.InjectMocks;
import org.mockito.Mock;
import org.mockito.junit.jupiter.MockitoExtension;

import java.time.LocalDate;

import static org.junit.jupiter.api.Assertions.assertEquals;

@ExtendWith(MockitoExtension.class)
public class UserServiceTests {
    @Mock
    private UserRepository userRepository;
    @InjectMocks
    private UserService userService;

    LocationEntity location = new LocationEntity(1, "Ho Chi Minh");
    @Test
    public void testUpdateUser() {
        String username = "trangnq2";
        LocalDate newDob = LocalDate.of(2021, 7, 27);
        String newGender = "female";
        LocalDate newJoint = LocalDate.of(2022, 9, 26);
        String newType = "staff";

        UserEntity user = userRepository.findByUsernameAndLocation(username, location);
        user.setDob(newDob);
        user.setGender(newGender);
        user.setJointDate(newJoint);
        user.setType(newType);
        UserDto update = UserMapper.toDto(user);

        UserDto updatedUser = userService.edit(update, username);
        System.out.println(updatedUser);
        assertEquals(newDob, updatedUser.getDob());

    }
}
