<?php

namespace Controller;


use Model\User;

class ViewUser
{
    public function view(): string
    {

        $users = User::all();
//        var_dump(app()->auth::user()->role); die();
        return (new \Src\View())->render('site.view', ['users' => $users]);
    }
}