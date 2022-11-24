package com.nt.rookies.b6g3backend.dtos.response;

import com.nt.rookies.b6g3backend.dtos.UserDto;
import lombok.Builder;
import lombok.Getter;
import lombok.Setter;

@Getter @Setter
@Builder
public class LoginResponse {
    private String accessToken;
    private String refreshToken;
    private UserDto userDto;
}
