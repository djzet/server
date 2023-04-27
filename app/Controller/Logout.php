<?php

namespace Controller;

use Src\Auth\Auth;

class Logout
{
    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/');
    }
}