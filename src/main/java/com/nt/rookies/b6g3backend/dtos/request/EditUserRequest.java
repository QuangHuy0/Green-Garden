package com.nt.rookies.b6g3backend.dtos.request;

import lombok.Builder;
import lombok.Getter;

import java.time.LocalDate;

@Getter
@Builder
public class EditUserRequest {
    private String username;
    private String firstName;
    private String lastName;
    private LocalDate dob;
    private LocalDate jointDate;
    private String gender;
    private String type;
    private String location;
    private String staffCode;
}
