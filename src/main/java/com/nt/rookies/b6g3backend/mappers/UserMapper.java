package com.nt.rookies.b6g3backend.mappers;

import com.nt.rookies.b6g3backend.dtos.UserDto;
import com.nt.rookies.b6g3backend.entities.UserEntity;

import java.io.Serializable;
import java.util.List;
import java.util.Optional;
import java.util.stream.Collectors;

public class UserMapper {
    public static UserDto toDto(UserEntity entity) {
        return UserDto.builder()
                .staffCode(entity.getStaffCode())
                .dob(entity.getDob())
                .firstName(entity.getFirstName())
                .gender(entity.getGender())
                .jointDate(entity.getJointDate())
                .lastName(entity.getLastName())
                .location(entity.getLocation().getName())
                .type(entity.getType())
                .username(entity.getUsername())
                .build();
    }

    public static UserDto toDto(Optional<UserEntity> entity) {
        return entity.map(userEntity -> UserDto.builder()
                .staffCode(userEntity.getStaffCode())
                .dob(userEntity.getDob())
                .firstName(userEntity.getFirstName())
                .gender(userEntity.getGender())
                .jointDate(userEntity.getJointDate())
                .lastName(userEntity.getLastName())
                .location(userEntity.getLocation().getName())
                .type(userEntity.getType())
                .username(userEntity.getUsername())
                .build()).orElse(null);
    }

    public static UserEntity toEntity(UserDto user) {
        return UserEntity.builder()
                .firstName(user.getFirstName())
                .lastName(user.getLastName())
                .dob(user.getDob())
                .jointDate(user.getJointDate())
                .gender(user.getGender())
                .type(user.getType())
                .staffCode(user.getStaffCode())
                .username(user.getUsername())
                .build();
    }

    public static List<Serializable> toDtoList(List<UserEntity> entities) {
        return entities.stream().map(UserMapper::toDto).collect(Collectors.toList());
    }
}
