<?php

class Connection {

  public static function make($config){
    try {
      if($config['dsn_type'] !== 'local'){
        $dsn = $config['connection_type'].":"."unix_socket=".$config['MYSQL_DSN'].";dbname=".$config['dbname'];
      }
      $dsn = $config['connection_type'].":"."dbname=".$config['dbname'].";host=".$config['db_host'];


      return new PDO($dsn, $config['db_username'], $config['db_password']);
    } catch (PDOExpection $e) {
      echo 'Connection failed: ' . $e->getMessage();
    }
  }

}
