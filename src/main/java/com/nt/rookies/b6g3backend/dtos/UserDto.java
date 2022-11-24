package com.nt.rookies.b6g3backend.dtos;

import lombok.Builder;
import lombok.Getter;
import lombok.Setter;

import javax.validation.constraints.Past;
import java.io.Serializable;
import java.time.LocalDate;

@Getter @Setter
@Builder
public class UserDto implements Serializable {
    private String username;
    private String firstName;
    private String lastName;
    @Past
    private LocalDate dob;
    private LocalDate jointDate;
    private String gender;
    private String type;
    private String location;
    private String staffCode;
}
