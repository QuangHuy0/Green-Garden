package com.nt.rookies.b6g3backend.utils;

import com.nt.rookies.b6g3backend.config.Constants;
import com.nt.rookies.b6g3backend.security.UserDetailsImpl;
import io.jsonwebtoken.*;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.stereotype.Component;

import java.util.Date;

@Component
public class JwtUtils {
    private JwtUtils() {}

    private static final Logger logger = LoggerFactory.getLogger(JwtUtils.class);

    public static String generateJwtToken(Authentication authentication) {

        UserDetailsImpl userPrincipal = (UserDetailsImpl) authentication.getPrincipal();

        return Jwts.builder()
                .setSubject((userPrincipal.getUsername()))
                .setIssuedAt(new Date())
                .setExpiration(new Date((new Date()).getTime() + Constants.JWT_EXPIRATION_MS))
                .signWith(SignatureAlgorithm.HS512, Constants.JWT_SECRET_KEY)
                .compact();
    }

    public static String getUserNameFromJwtToken(String token) {
        return extractAllClaims(token).getSubject();
    }

    private static Claims extractAllClaims(String token) {
        return Jwts.parser().setSigningKey(Constants.JWT_SECRET_KEY).parseClaimsJws(token).getBody();
    }

    public static boolean validateJwt(String authToken) {
        try {
            extractAllClaims(authToken);
            return true;
        } catch (SignatureException e) {
            logger.error("Invalid JWT signature: {}", e.getMessage());
        } catch (MalformedJwtException e) {
            logger.error("Invalid JWT token: {}", e.getMessage());
        } catch (ExpiredJwtException e) {
            logger.error("JWT token is expired: {}", e.getMessage());
        } catch (UnsupportedJwtException e) {
            logger.error("JWT token is unsupported: {}", e.getMessage());
        } catch (IllegalArgumentException e) {
            logger.error("JWT claims string is empty: {}", e.getMessage());
        }

        return false;
    }

    public static Boolean isValidToken(String token, UserDetails userDetails) {
        Claims claims = extractAllClaims(token);
        String username = claims.getSubject();
        Date expiration = claims.getExpiration();
        return (username.equals(userDetails.getUsername()) &&
                !expiration.before(new Date()));
    }
}
