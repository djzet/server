<?php

namespace Controller\User;

use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Login
{
    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'login' => ['required', 'latin'],
                'password' => ['required']
            ], [
                'latin' => 'Поле :field должго состоять из латиници',
                'required' => 'Поле :field пусто',
            ]);
            if ($validator->fails()) {
                return new View('site.login',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            //Если удалось аутентифицировать пользователя, то редирект
            if (Auth::attempt($request->all())) {
                $token = app()->auth::generateToken();
                Auth::user()->update([
                    'token' => $token
                ]);
                app()->route->redirect('/');
                return false;
            }
        }

        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }
}