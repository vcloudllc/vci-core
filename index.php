<?php
require 'core/functions.php';
show_errors();

require 'vendor/autoload.php';
require('core/bootstrap.php');

if(strpos(Request::uri(), 'views/assets') === 0) {
    die(file_get_contents(Request::uri()));
}

try {
    Router::load('routes.php')->direct(Request::uri(), Request::method());
} catch(AuthenticationException $e) {
    if(strpos($_SERVER['HTTP_ACCEPT'], 'json') !== false) {
        http_response_code($e->getCode());
        echo json_encode([
            'message' => $e->getMessage(),
        ]);
        die();
    };

    header('Location: /login'); 
}