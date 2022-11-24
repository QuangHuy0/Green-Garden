package com.nt.rookies.b6g3backend.repositories;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.orm.jpa.DataJpaTest;

@DataJpaTest
public class ReturningRequestRepositoryTests {
    @Autowired
    private ReturningRequestRepository returningRequestRepository;
}
