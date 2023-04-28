<?php

namespace Controller;

use Model\Role;
use Model\User;
use Src\Request;
use Src\View;

class Update
{
    public function update(Request $request): string
    {
        //var_dump($request->all());die();
        if ($request->method === 'GET') {
            $users = User::where('id', $request->id)->first();
        }
        if ($request->method === 'POST') {
            $payload = $request->all();
            $users = User::where('id', $request->id)->update($payload);
            app()->route->redirect('/');
        }
        $roles = Role::all();
        return (new View())->render('site.update', ['users' => $users, 'roles' => $roles]);
    }
}