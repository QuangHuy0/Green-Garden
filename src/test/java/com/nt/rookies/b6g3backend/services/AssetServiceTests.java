package com.nt.rookies.b6g3backend.services;

import com.nt.rookies.b6g3backend.repositories.AssetRepository;
import org.junit.jupiter.api.extension.ExtendWith;
import org.mockito.InjectMocks;
import org.mockito.Mock;
import org.mockito.junit.jupiter.MockitoExtension;

@ExtendWith(MockitoExtension.class)
public class AssetServiceTests {
    @Mock
    private AssetRepository assetRepository;
    @InjectMocks
    private AssetService assetService;
}
