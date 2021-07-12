<?php

$router->get('','PagesController@index');

$router->get('home','PagesController@index', [
    'auth' => [
        'custom_domains' => [
            'vcloud.com',
            'vcloudclients.com',
        ]
    ],
]);

$router->get('anotherpage','PagesController@index', ['auth']);

$router->get('login', 'PagesController@login');
$router->post('login', 'AuthenticationController@login');
$router->get('logout', 'AuthenticationController@logout');
