package com.nt.rookies.b6g3backend.config;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Component;

@Component
public class Constants {
//    @Value("${jwt.secret.key}")
    public static String JWT_SECRET_KEY = "ChIfDoEmLoDjDvEBDev";

//    @Value("${jwt.expiration}")
    public static int JWT_EXPIRATION_MS = 86400000;

    public static final String JWT_TOKEN_PREFIX = "Bearer ";
    public static final String JWT_HEADER = "Authorization";


}
