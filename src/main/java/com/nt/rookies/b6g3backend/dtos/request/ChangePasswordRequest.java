package com.nt.rookies.b6g3backend.dtos.request;

import lombok.Getter;
import lombok.Setter;

@Getter @Setter
public class ChangePasswordRequest {
    private String password;
    private String confirmPassword;
}
