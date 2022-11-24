package com.nt.rookies.b6g3backend.services;

import com.nt.rookies.b6g3backend.repositories.ReturningRequestRepository;
import org.junit.jupiter.api.extension.ExtendWith;
import org.mockito.InjectMocks;
import org.mockito.Mock;
import org.mockito.junit.jupiter.MockitoExtension;

@ExtendWith(MockitoExtension.class)
public class ReturningRequestServiceTests {
    @Mock
    private ReturningRequestRepository returningRequestRepository;
    @InjectMocks
    private ReturningRequestService returningRequestService;
}
