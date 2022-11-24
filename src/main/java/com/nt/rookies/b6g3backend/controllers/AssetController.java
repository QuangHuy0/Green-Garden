package com.nt.rookies.b6g3backend.controllers;

import com.nt.rookies.b6g3backend.config.Constants;
import com.nt.rookies.b6g3backend.dtos.AssetDto;
import com.nt.rookies.b6g3backend.dtos.ResponseObject;
import org.springframework.data.domain.Pageable;
import org.springframework.data.web.PageableDefault;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/v1/assets")
@PreAuthorize("hasAuthority('Admin')")
public class AssetController {
    @GetMapping
    public ResponseEntity<ResponseObject> getAssets(
            @RequestParam(value = "keyword", required = false) String keyword,
            @PageableDefault Pageable pageable
            ) {
        return null;
    }

    @GetMapping("/{assetCode}")
    public ResponseEntity<ResponseObject> getAsset(@PathVariable String assetCode) {
        return null;
    }

    @PostMapping
    public ResponseEntity<ResponseObject> createAsset(@RequestBody AssetDto assetDto) {
        return null;
    }

    @PutMapping("/{assetCode}")
    public ResponseEntity<ResponseObject> updateAsset(@PathVariable String assetCode, @RequestBody AssetDto assetDto) {
        return null;
    }

    @DeleteMapping("/{assetCode}")
    public ResponseEntity<ResponseObject> deleteAsset(@PathVariable String assetCode) {
        return null;
    }

    @GetMapping("/report")
    public ResponseEntity<ResponseObject> getReport() {
        return null;
    }
}
