package com.nt.rookies.b6g3backend.exceptions;

public class GlobalException extends RuntimeException {
    public GlobalException() {
    }

    public GlobalException(String message) {
        super(message);
    }

    public GlobalException(Throwable cause) {
        super(cause);
    }
}
