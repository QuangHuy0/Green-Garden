package com.nt.rookies.b6g3backend.controllers;

import com.nt.rookies.b6g3backend.config.Constants;
import com.nt.rookies.b6g3backend.dtos.AssignmentDto;
import com.nt.rookies.b6g3backend.dtos.ResponseObject;
import com.nt.rookies.b6g3backend.dtos.request.ResponseAssignmentRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.data.web.PageableDefault;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/v1/assignments")
@PreAuthorize("hasAuthority('Admin')")
public class AssignmentController {
    @GetMapping
    @PreAuthorize("hasAuthority('Admin') or hasAuthority('Staff')")
    public ResponseEntity<ResponseObject> getAssignments(
            @RequestParam(value = "keyword", required = false) String keyword,
            @PageableDefault Pageable pageable
    ) {
        //TODO: get assignments depend on user type (ADMIN, STAFF)
        return null;
    }

    @GetMapping("/{id}")
    @PreAuthorize("hasAuthority('Admin') or hasAuthority('Staff')")
    public ResponseEntity<ResponseObject> getAssignment(@PathVariable Integer id) {
        return null;
    }

    @PostMapping
    public ResponseEntity<ResponseObject> createAssignment(@RequestBody AssignmentDto assignmentDto) {
        return null;
    }

    @PutMapping("/{id}")
    public ResponseEntity<ResponseObject> updateAssignment(@PathVariable Integer id, @RequestBody AssignmentDto assignmentDto) {
        return null;
    }

    @PatchMapping("/{id}")
    @PreAuthorize("hasAuthority('Admin') or hasAuthority('Staff')")
    public ResponseEntity<ResponseObject> respondAssignment(@PathVariable Integer id, @RequestBody ResponseAssignmentRequest responseAssignmentRequest) {
        return null;
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<ResponseObject> deleteAssignment(@PathVariable Integer id) {
        return null;
    }
}
