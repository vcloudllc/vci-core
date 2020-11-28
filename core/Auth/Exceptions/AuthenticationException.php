<?php

class AuthenticationException extends Exception
{
    public function __construct($message = null, $code = null)
    {
        parent::__construct($message ?: 'Unauthorized', $code ?: 401);
    }
}
