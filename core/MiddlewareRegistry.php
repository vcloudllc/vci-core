<?php

class MiddlewareRegistry
{
    private array $middlewares = [];

    public function add(string $middleware, Callable $handler): void
    {
        $this->middlewares[$middleware] = $handler;
    }

    public function get(string $middleware): Callable
    {
        if(!array_key_exists($middleware, $this->middlewares)){
            throw new Exception("Middleware $middleware doesn't exist", 500);
        }

        return $this->middlewares[$middleware];
    }

    public function execute(string $middleware, $parameter = null)
    {
        $middleware = $this->get($middleware);
        return $middleware($parameter);
    }
}
