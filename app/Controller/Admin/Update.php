<?php

namespace Controller\Admin;

use Model\Role;
use Model\User;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Update
{
    public function update(Request $request): string
    {
        $roles = Role::all();
        if ($request->method === 'GET') {
            $users = User::where('id', $request->id)->first();
        }
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'login' => ['required', 'latin'],
                'role' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'latin' => 'Поле :field должго состоять из латиници',
            ]);
            if ($validator->fails()) {
                return new View('site.update',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'roles' => $roles]);
            }
            if (User::where('id', $request->id)->update($request->all())){
                app()->route->redirect('/');
                return false;
            }
        }
        return (new View())->render('site.update', ['users' => $users, 'roles' => $roles]);
    }
}