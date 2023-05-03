<?php

namespace Controller\Admin;

use Model\User;
use Src\Request;

class Delete
{
    public function deleteUser(Request $request)
    {
        $users = User::where('id', $request->id)->first();
        if ($users->delete()) {
            app()->route->redirect('/');
        }
    }
}