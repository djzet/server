<?php

namespace Controller\User;

use Model\Group;
use Src\View;

class Groups
{
    public function showGroups(): string
    {
        $groups = Group::all();
        return (new View())->render('site.group', ['groups' => $groups]);
    }
}