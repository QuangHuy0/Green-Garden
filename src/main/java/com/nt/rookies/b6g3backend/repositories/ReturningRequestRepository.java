package com.nt.rookies.b6g3backend.repositories;

import com.nt.rookies.b6g3backend.entities.ReturningRequestEntity;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface ReturningRequestRepository extends JpaRepository<ReturningRequestEntity, Integer> {
}
