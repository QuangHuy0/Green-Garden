package com.nt.rookies.b6g3backend.dtos.request;

import lombok.Getter;

import javax.validation.constraints.NotBlank;
import javax.validation.constraints.Pattern;

@Getter
public class LoginRequest {
    @NotBlank(message = "Username is required")
    private String username;
    @Pattern(regexp = "^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#&()–[{}]:;',?/*~$^+=<> ]).{8,15}$",
    message = "Password must contains 0-9, a-z, A-Z, special characters (@, !, #, ...), and " +
            "a length of at least 8 characters and a maximum of 15 characters.")
    private String password;
}
