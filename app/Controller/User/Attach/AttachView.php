<?php

namespace Controller\User\Attach;


use Model\Discipline;
use Src\Request;
use Src\View;

class AttachView
{
    public function attachView(Request $request): string
    {
        $group_disciplines = Discipline::all();
        return (new View())->render('site.attach-group', ['group_disciplines' => $group_disciplines]);
    }
}