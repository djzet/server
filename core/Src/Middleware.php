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

    //Запуск всех middlewares для текущего маршрута

    public function runMiddlewares(string $httpMethod, string $uri): Request
    {
        $request = new Request();
        //Получаем список всех разрешенных классов middlewares из настроек приложения
        $routeMiddleware = app()->settings->app['routeMiddleware'];

        //Перебираем все middlewares для текущего адреса
        foreach ($this->getMiddlewaresForRoute($httpMethod, $uri) as $middleware) {
            $args = explode(':', $middleware);
            //Создаем объект и вызываем метод handle
            (new $routeMiddleware[$args[0]])->handle($request, $args[1] ?? null);
        }
        //Возвращаем итоговый request
        return $request;
    }

    //Поиск middlewares по адресу
    private function getMiddlewaresForRoute(string $httpMethod, string $uri): array
    {
        $dispatcherMiddleware = new Dispatcher($this->middlewareCollector->getData());
        return $dispatcherMiddleware->dispatch($httpMethod, $uri)[1] ?? [];
    }
}
