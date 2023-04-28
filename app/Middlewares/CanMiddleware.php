<?php

namespace Middlewares;

use Exception;
use Src\Auth\Auth;
use Src\Request;

class CanMiddleware
{
    /**
     * @throws Exception
     */
    public function handle(Request $request, string $roles): void
    {
        //var_dump(explode('|', $roles));die();
        // var_dump(Auth::user()->getRole);die();
        //Если роли текущего авторизированного пользователя нет в параметрах, то ошибка
        //var_dump(Auth::user()->hasRole(explode('|', $roles)));die();
        if (!Auth::user()->hasRole(explode('|', $roles))) {
            throw new Exception('Forbidden for you');
        }
    }
}