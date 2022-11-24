package com.nt.rookies.b6g3backend.entities;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

import javax.persistence.*;
import java.time.LocalDate;

@Entity
@Table(name = "assignments")
@Data
@NoArgsConstructor
@AllArgsConstructor
public class AssignmentEntity extends BaseEntity{
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;
    private String state;
    @Column(name = "assigned_date")
    private LocalDate assignedDate;
    @Column(length = 500)
    private String note;
    @ManyToOne(fetch = FetchType.EAGER)
    @JoinColumn(name = "assigned_to")
    private UserEntity assignedTo;
    @ManyToOne(fetch = FetchType.EAGER)
    @JoinColumn(name = "assigned_by")
    private UserEntity assignedBy;
    @ManyToOne(fetch = FetchType.EAGER)
    @JoinColumn(name = "asset")
    private AssetEntity asset;
}
