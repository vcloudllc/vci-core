<?php

$middlewares->add('auth', function($args) {
    if(!isset($args['custom_domains'])) {
        $args['custom_domains'] = App::get('config')['auth']['allowed_domains'];
    }

    AuthenticationService::getServiceObject()->authenticate($_REQUEST, $args['custom_domains']);
});
