<?php

namespace Controller\User\Discipline;

use Model\Discipline;
use Src\View;

class Disciplines
{
    public function showGroups(): string
    {
        $disciplines = Discipline::all();
        return (new View())->render('site.discipline', ['disciplines' => $disciplines]);
    }
}