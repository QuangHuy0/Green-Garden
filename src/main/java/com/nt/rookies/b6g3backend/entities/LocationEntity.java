package com.nt.rookies.b6g3backend.entities;

import lombok.Data;

import javax.persistence.*;

@Entity
@Table(name = "locations")
@Data
public class LocationEntity extends BaseEntity{
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;
    private String name;

    public LocationEntity(Integer id, String name) {
        this.id = id;
        this.name = name;
    }

    public LocationEntity() {
    }
}
