package com.nt.rookies.b6g3backend.controllers;

import com.nt.rookies.b6g3backend.config.Constants;
import com.nt.rookies.b6g3backend.dtos.ReturningRequestDto;
import com.nt.rookies.b6g3backend.dtos.ResponseObject;
import com.nt.rookies.b6g3backend.dtos.request.ResponseReturningRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.data.web.PageableDefault;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/v1/returnings")
@PreAuthorize("hasAuthority('Admin')")
public class ReturningRequestController {
    @GetMapping
    public ResponseEntity<ResponseObject> getReturningRequests(
            @RequestParam(value = "keyword", required = false) String keyword,
            @PageableDefault Pageable pageable
    ) {
        return null;
    }

    @GetMapping("/{id}")
    public ResponseEntity<ResponseObject> getReturningRequest(@PathVariable Integer id) {
        return null;
    }

    @PostMapping
    @PreAuthorize("hasAuthority('Admin') or hasAuthority('Staff')")
    public ResponseEntity<ResponseObject> createReturningRequest(@RequestBody ReturningRequestDto returningRequestDto) {
        return null;
    }

    @PatchMapping("/{id}")
    public ResponseEntity<ResponseObject> respondReturningRequest(@PathVariable Integer id, @RequestBody ResponseReturningRequest responseReturningRequest) {
        return null;
    }
}
