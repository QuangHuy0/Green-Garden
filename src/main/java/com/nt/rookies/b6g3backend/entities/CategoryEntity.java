package com.nt.rookies.b6g3backend.entities;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

import javax.persistence.*;

@Entity
@Table(name = "categories")
@Data
@NoArgsConstructor
@AllArgsConstructor
public class CategoryEntity extends BaseEntity{
    @Id
    @Column(name = "prefix", length = 2)
    private String prefix;
    private String category;
}
