<?php

namespace Src;

use FastRoute\DataGenerator\MarkBased;
use FastRoute\Dispatcher\MarkBased as Dispatcher;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;
use Src\Traits\SingletonTrait;

class Middleware
{
    //Используем трейт
    use SingletonTrait;

    private RouteCollector $middlewareCollector;

    private function __construct()
    {
        $this->middlewareCollector = new RouteCollector(new Std(), new MarkBased());
    }

    public function add($httpMethod, string $route, array $action): void
    {
        $this->middlewareCollector->addRoute($httpMethod, $route, $action);
    }

    //Конструктор скрыт. Вызывается только один раз

    public function group(string $prefix, callable $callback): void
    {
        $this->middlewareCollector->addGroup($prefix, $callback);
    }

    //Поиск middlewares по адресу

    public function go(string $httpMethod, string $uri, Request $request): Request
    {
        return $this->runMiddlewares($httpMethod, $uri, $this->runAppMiddlewares($request));
    }

    //Запуск всех middlewares

    private function runMiddlewares(string $httpMethod, string $uri, Request $request): Request
    {
        //Получаем список всех разрешенных классов middlewares из настроек приложения
        $routeMiddleware = app()->settings->app['routeMiddleware'];

        //Перебираем все middlewares для текущего адреса
        foreach ($this->getMiddlewaresForRoute($httpMethod, $uri) as $middleware) {
            $args = explode(':', $middleware);
            //Создаем объект и вызываем метод handle
            $request = (new $routeMiddleware[$args[0]])->handle($request, $args[1] ?? null) ?? $request;
        }
        //Возвращаем итоговый request
        return $request;
    }

//Запуск всех middlewares для текущего маршрута

    private function getMiddlewaresForRoute(string $httpMethod, string $uri): array
    {
        $dispatcherMiddleware = new Dispatcher($this->middlewareCollector->getData());
        return $dispatcherMiddleware->dispatch($httpMethod, $uri)[1] ?? [];
    }

//Запуск всех глобальных middlewares

    private function runAppMiddlewares(Request $request): Request
    {
        //Получаем список всех разрешенных классов middlewares из настроек приложения
        $routeMiddleware = app()->settings->app['routeAppMiddleware'];

        //Перебираем и запускаем их
        foreach ($routeMiddleware as $name => $class) {
            $args = explode(':', $name);
            $request = (new $class)->handle($request, $args[1] ?? null) ?? $request;
        }
        return $request;
    }

}
