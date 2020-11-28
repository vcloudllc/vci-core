<?php

class Router {
  public $routes = [
    'GET' => [],
    'POST' => []
  ];

  public static function load($file){
    $router = new static;
    require $file;
    return $router;
  }

  public function get($uri, $controller, array $middlewares = []) {
    $this->routes['GET'][$uri] = [
      'controller' => $controller,
      'middlewares' => $middlewares,
    ];
  }

  public function post($uri, $controller, array $middlewares = []) {
    $this->routes['POST'][$uri] = [
      'controller' => $controller,
      'middlewares' => $middlewares,
    ];;
  }

  public function direct($uri, $requestType){

    if (array_key_exists($uri, $this->routes[$requestType])){
      $route = $this->routes[$requestType][$uri];
      $this->executeMiddlewares($route);
      return $this->callAction(
        ...explode('@', $route['controller'])
      );
    }

    throw new Exception('No routes definded');
  }

  protected function callAction($controller, $action){
    if(! method_exists($controller, $action)){
      throw new Exception(
        "{$controller} does not respond to the {$action} action"
      );
    }

    return (new $controller)->$action();

  }

  protected function executeMiddlewares(array $route)
  {
    $middlewares = App::getMiddlewares();
    foreach($route['middlewares'] as $middleware => $args) {
      if(is_int($middleware)) {
        $middlewares->execute($args);
      } else {
        $middlewares->execute($middleware, (array) $args);
      }
    }
  }

}
