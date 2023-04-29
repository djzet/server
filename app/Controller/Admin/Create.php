<?php

namespace Controller\Admin;

use Model\User;
use Src\Request;
use Src\View;

class Create
{
    public function create(Request $request): string
    {
        // var_dump($request->all());die();
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/');
        }
        return new View('site.create');
    }
}