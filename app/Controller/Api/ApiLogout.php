<?php

namespace Controller\Api;

use Src\Auth\Auth;
use Src\Request;
use Src\View;

class ApiLogout
{
    public function logout(Request $request)
    {
        if (!Auth::attempt($request->all())) {
            $token = null;
            Auth::user()->update([
                'token' => $token
            ]);
        }
        Auth::logout();
        (new View())->toJSON((array)'logout');
    }
}