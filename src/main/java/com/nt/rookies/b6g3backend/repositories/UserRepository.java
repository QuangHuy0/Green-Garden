package com.nt.rookies.b6g3backend.repositories;

import com.nt.rookies.b6g3backend.entities.LocationEntity;
import com.nt.rookies.b6g3backend.entities.UserEntity;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.Optional;

@Repository
public interface UserRepository extends JpaRepository<UserEntity, String> {

    UserEntity findByUsernameAndLocation(String username, LocationEntity locationEntity);

    @Query("select u from UserEntity u where u.username = ?1 and u.location = ?2")
    Optional<UserEntity> findByUsernameAndLocations(String username, LocationEntity locationEntity);
}
