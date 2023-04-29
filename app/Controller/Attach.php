<?php

namespace Controller;

use Model\Group;
use Src\Request;
use Src\View;

class Attach
{
    public function attach(Request $request): string
    {
        $groups = Group::all();
        return (new View())->render('site.attach', ['groups' => $groups]);
    }
}