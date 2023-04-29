<?php

namespace Controller\User;

use Model\Group;
use Src\Request;
use Src\View;

class RatingStudent
{
    public function rating(Request $request): string
    {
        $groups = Group::all();
        return (new View())->render('site.rating', ['groups' => $groups]);
    }
}