<?php

class Request  {
  static function uri(){

    return trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH), '/');
  }
  static function method(){
    return $_SERVER['REQUEST_METHOD'];
  }
}
