<?php

namespace Controller\Api;

use Src\Auth\Auth;
use Src\Request;
use Src\View;

class ApiLogin
{
    public function login(Request $request)
    {
        if ($request->method === 'POST') {
            if (Auth::attempt($request->all())) {
                $token = app()->auth::generateToken();
                Auth::user()->update([
                    'token' => $token
                ]);
                $token = app()->auth::user()->toArray();
                (new View())->toJSON($token);
            } else {
                (new View())->toJSON((array)'Login error');
            }
        }
    }
}