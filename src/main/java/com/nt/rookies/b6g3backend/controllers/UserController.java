package com.nt.rookies.b6g3backend.controllers;

import com.nt.rookies.b6g3backend.config.Constants;
import com.nt.rookies.b6g3backend.dtos.ResponseObject;
import com.nt.rookies.b6g3backend.dtos.UserDto;
import com.nt.rookies.b6g3backend.dtos.request.ChangePasswordRequest;
import com.nt.rookies.b6g3backend.services.UserService;
import org.springframework.data.domain.Pageable;
import org.springframework.data.web.PageableDefault;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;

import javax.validation.Valid;

@RestController
@RequestMapping("api/v1/users")
@PreAuthorize("hasAuthority('Admin')")
public class UserController {
    private UserService userService;
    public UserController(UserService userService) {
        this.userService = userService;
    }
    @GetMapping
    public ResponseEntity<ResponseObject> getUsers(
            @RequestParam(value = "keyword", required = false) String keyword,
            @PageableDefault Pageable pageable
    ) {
        return null;
    }

    @GetMapping("/{username}")
    public ResponseEntity<ResponseObject> getUser(@PathVariable String username) {
        UserDto response = this.userService.getByUsername(username);
        if (response != null) {
            return ResponseEntity.ok(
                    ResponseObject.builder()
                            .status(HttpStatus.OK)
                            .message("Get user with username=" + username + " successfully!")
                            .data(response)
                            .build()
            );
        } else {
            return ResponseEntity.notFound().build();
        }
    }

    @PostMapping
    public ResponseEntity<ResponseObject> createUser(@RequestBody UserDto userDto) {
        return null;
    }

    @PutMapping("/{username}")
    public ResponseEntity<ResponseObject> updateUser(@PathVariable String username, @RequestBody @Valid UserDto userDto, BindingResult result) {
        if(result.hasErrors()) {
            System.out.println("lalala");
            return ResponseEntity.badRequest().build();
        }else {
            UserDto response = this.userService.edit(userDto, username);
            if (response != null) {
                return ResponseEntity.ok(
                        ResponseObject.builder()
                                .status(HttpStatus.OK)
                                .message("Updated username=" + username + " successfully!")
                                .data(response)
                                .build()
                );
            } else {
                return ResponseEntity.badRequest().build();
            }
        }
    }

    @PreAuthorize("hasAuthority('Admin') or hasAuthority('Staff')")
    @PatchMapping("/{username}")
    public ResponseEntity<ResponseObject> changePassword(@PathVariable String username, @RequestBody ChangePasswordRequest request) {
        return null;
    }

    @DeleteMapping("/{username}")
    public ResponseEntity<ResponseObject> disableUser(@PathVariable String username) {
        return null;
    }
}
