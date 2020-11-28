<?php

return [
  'twilio' => [
    'ACCOUNT_SID' => '',
    'API_KEY_SID' => '',
    'API_KEY_SECRET' => '',
    'AUTH_TOKEN' => '',
    'TWILIO_NUMBER' => ''
  ],
  'database' => [
    'connection_type' => 'mysql',
    'dsn_type' => getenv('DSN_TYPE')?: 'local',
    'db_host' => getenv('MYSQL_HOST') ?: '',
    'MYSQL_DSN' => getenv('MYSQL_DSN') ?: '',
    'db_username' => getenv('MYSQL_USER')?: '',
    'dbname' => getenv('MYSQL_DBNAME') ?: '',
    'db_password' => getenv('MYSQL_PASSWORD')?: '',
    'options' => [PDO::ERRMODE_EXCEPTION]
  ],
  'google' => [
    'GOOGLE_API_TOKEN' => '',
    'CLIENT_ID' => getenv('GOOGLE_CLIENT_ID'),
  ],
  'auth' => [
    'allowed_domains' => [
      'vcloudclients.com',
      'vcloud.com',
    ],
  ],
];
