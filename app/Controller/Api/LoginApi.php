<?php

namespace Controller\Api;

use Src\Auth\Auth;
use Src\Request;
use Src\View;

class LoginApi
{
    public function login(Request $request)
    {
        if ($request->method === 'POST') {
            if (Auth::attempt($request->all())) {
                $token = bin2hex(random_bytes(16));
            }else {
                $token = 'Authentication unsuccessful';
            }
        }
        (new View())->toJSON((array)$token);
    }
}