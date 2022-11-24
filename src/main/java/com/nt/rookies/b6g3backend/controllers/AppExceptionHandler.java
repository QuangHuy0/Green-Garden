package com.nt.rookies.b6g3backend.controllers;

import com.nt.rookies.b6g3backend.dtos.ResponseObject;
import com.nt.rookies.b6g3backend.exceptions.GlobalException;
import com.nt.rookies.b6g3backend.exceptions.NotFoundException;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.context.request.WebRequest;

@ControllerAdvice
public class AppExceptionHandler {
    @ExceptionHandler(NotFoundException.class)
    public ResponseEntity<ResponseObject> handleNotFoundException(
            NotFoundException ex, WebRequest request) {
        HttpStatus status = HttpStatus.NOT_FOUND;
        ResponseObject object = ResponseObject.builder()
                .status(status)
                .message(ex.getMessage())
                .build();
        return new ResponseEntity<>(object, status);
    }

    @ExceptionHandler(GlobalException.class)
    public ResponseEntity<ResponseObject> handleDefaultException(GlobalException ex) {
        HttpStatus status = HttpStatus.INTERNAL_SERVER_ERROR;
        ResponseObject object = ResponseObject.builder()
                .status(status)
                .message("Internal server error")
                .build();
        return new ResponseEntity<>(object, status);
    }
}
