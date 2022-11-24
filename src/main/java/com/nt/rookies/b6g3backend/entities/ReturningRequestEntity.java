package com.nt.rookies.b6g3backend.entities;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

import javax.persistence.*;
import java.time.LocalDate;

@Entity
@Table(name = "returning_requests")
@Data
@NoArgsConstructor
@AllArgsConstructor
public class ReturningRequestEntity extends BaseEntity{
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;
    @Column(name = "returned_date")
    private LocalDate returnedDate;
    private String state;
    @ManyToOne(fetch = FetchType.EAGER)
    @JoinColumn(name = "assignment_id")
    private AssignmentEntity assignment;
    @ManyToOne(fetch = FetchType.EAGER)
    @JoinColumn(name = "requested_by")
    private UserEntity requestedBy;
    @ManyToOne(fetch = FetchType.EAGER)
    @JoinColumn(name = "accepted_by")
    private UserEntity acceptedBy;
}
