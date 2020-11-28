<?php

class App {
  public static $registry = [];
  
  private static ?MiddlewareRegistry $middlewares = null;

  static function bind($key,$value)
  {
    static::$registry[$key] = $value;
  }

  static function get($key)
  {
    if(!array_key_exists($key, static::$registry)){
      throw new \Exception("$key is not bound to registry", 1);
    }
    return static::$registry[$key];
  }

  public static function getMiddlewares(): MiddlewareRegistry
  {
    if(is_null(static::$middlewares)) {
      static::$middlewares = new MiddlewareRegistry;
    }

    return static::$middlewares;
  } 

  public static function loadMiddlewares(string $file): void
  {
    $middlewares = static::getMiddlewares();
    require $file;
  }
}
