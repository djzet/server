<?php

namespace Controller;

use Model\User;
use Src\Request;
use Src\View;

class Singup
{
    public function signup(Request $request): string
    {
        // var_dump($request->all());die();
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/');
        }
        return new View('site.signup');
    }
}