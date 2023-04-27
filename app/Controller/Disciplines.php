<?php

namespace Controller;
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