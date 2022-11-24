package com.nt.rookies.b6g3backend.controllers;

import com.nt.rookies.b6g3backend.dtos.ResponseObject;
import com.nt.rookies.b6g3backend.dtos.UserDto;
import com.nt.rookies.b6g3backend.dtos.request.LoginRequest;
import com.nt.rookies.b6g3backend.dtos.response.LoginResponse;
import com.nt.rookies.b6g3backend.repositories.UserRepository;
import com.nt.rookies.b6g3backend.security.UserDetailsImpl;
import com.nt.rookies.b6g3backend.utils.JwtUtils;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;
import java.util.stream.Collectors;

@RestController
@RequestMapping("/api/v1/auth")
public class AuthController {
    private final Logger logger = LoggerFactory.getLogger(AuthController.class);

    @Autowired
    AuthenticationManager authenticationManager;

    @Autowired
    UserRepository userRepository;

    @PostMapping("/login")
    public ResponseEntity<ResponseObject> login(@RequestBody LoginRequest loginRequest) {
        //TODO: implement refresh token
        ResponseObject obj;
        try {
            logger.info("un={}, pw={}",loginRequest.getUsername(), loginRequest.getPassword());
            Authentication authentication = authenticationManager.authenticate(
                    new UsernamePasswordAuthenticationToken(loginRequest.getUsername(), loginRequest.getPassword()));

            SecurityContextHolder.getContext().setAuthentication(authentication);
            String jwt = JwtUtils.generateJwtToken(authentication);

            UserDetailsImpl userDetails = (UserDetailsImpl) authentication.getPrincipal();
            List<String> roles = userDetails.getAuthorities().stream()
                    .map(GrantedAuthority::getAuthority)
                    .collect(Collectors.toList());
            UserDto userDto = UserDto.builder()
                    .username(userDetails.getUsername())
                    .type(roles.get(0))
                    .build();
            obj = ResponseObject.builder()
                    .status(HttpStatus.OK)
                    .message("Login successfully!")
                    .data(LoginResponse.builder()
                            .accessToken(jwt)
                            .userDto(userDto)
                            .build())
                    .build();
        } catch (Exception e) {
            e.printStackTrace();
            obj = ResponseObject.builder().message("Login failed.").status(HttpStatus.UNAUTHORIZED).build();
            return new ResponseEntity<>(obj, HttpStatus.UNAUTHORIZED);
        }
        return ResponseEntity.ok(obj);
    }

}
