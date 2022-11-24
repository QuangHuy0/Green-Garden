package com.nt.rookies.b6g3backend;


import org.springframework.beans.factory.annotation.Value;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.data.web.config.EnableSpringDataWebSupport;

@SpringBootApplication
@ComponentScan(basePackages = "com.nt.rookies.b6g3backend")
@EnableSpringDataWebSupport
class AssetManagementApplication {
    @Value("${spring.profiles.active:}")
    private String profile;

    public static void main(String[] args) {
        SpringApplication.run(AssetManagementApplication.class, args);
    }

    @Bean
    public void testProfile() {
        System.out.println("Profiles: " + profile);
    }
}