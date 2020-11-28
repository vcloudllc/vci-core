<?php

class AuthenticationController
{
    public function login()
    {
        echo json_encode(
            AuthenticationService::getServiceObject()->authenticate($_REQUEST)
        );
    }

    public function logout()
    {
        AuthenticationService::getServiceObject()->logout();
        http_response_code(204);
        die();
    }
}
