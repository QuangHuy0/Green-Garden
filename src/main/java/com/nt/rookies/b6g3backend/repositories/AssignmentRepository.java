package com.nt.rookies.b6g3backend.repositories;

import com.nt.rookies.b6g3backend.entities.AssignmentEntity;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface AssignmentRepository extends JpaRepository<AssignmentEntity, Integer> {
}
