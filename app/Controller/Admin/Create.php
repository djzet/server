<?php

namespace Controller\Admin;

use Model\User;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Create
{
    public function create(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'login' => ['required', 'unique:users,login', 'latin'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'latin' => 'Поле :field должго состоять из латиници',
            ]);
            if ($validator->fails()) {
                return new View('site.create',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (User::create($request->all())) {
                app()->route->redirect('/');
            }
        }
        return new View('site.create');
    }
}