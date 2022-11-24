package com.nt.rookies.b6g3backend.controllers;

import com.nt.rookies.b6g3backend.dtos.CategoryDto;
import com.nt.rookies.b6g3backend.dtos.ResponseObject;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/v1/categories")
@PreAuthorize("hasAuthority('Admin')")
public class CategoryController {
    @GetMapping
    public ResponseEntity<ResponseObject> getCategories() {
        return null;
    }

    @PostMapping
    public ResponseEntity<ResponseObject> createCategory(@RequestBody CategoryDto categoryDto) {
        return null;
    }


}
