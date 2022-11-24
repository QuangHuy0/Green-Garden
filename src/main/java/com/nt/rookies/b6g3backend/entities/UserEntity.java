package com.nt.rookies.b6g3backend.entities;

import lombok.*;

import javax.persistence.*;
import javax.validation.constraints.Past;
import java.time.LocalDate;

@Entity
@Table(name = "users")
@NoArgsConstructor
@AllArgsConstructor
@Builder
@Data
@Setter
@Getter
public class UserEntity extends BaseEntity{
    @Column(name = "first_name")
    private String firstName;
    @Column(name = "last_name")
    private String lastName;
    @Column(name = "dob")
    private LocalDate dob;
    @Column(name = "joint_date")
    private LocalDate jointDate;
    @Column(name = "gender", length = 50)
    private String gender;
    @Column(name = "type", length = 10)
    private String type;
    @Column(name = "staff_code", unique = true, length = 6)
    private String staffCode;
    @Id
    private String username;
    private String password;
    @Column(name = "enable")
    private boolean isEnable;
    @ManyToOne(fetch = FetchType.EAGER)
    @JoinColumn(name = "location_id")
    private LocationEntity location;

}
