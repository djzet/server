<?php

namespace Controller\Admin;


use Model\User;

class ViewUser
{
    public function view(): string
    {

        $users = User::all();
        return (new \Src\View())->render('site.view', ['users' => $users]);
    }
}