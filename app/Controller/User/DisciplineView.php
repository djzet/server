<?php

namespace Controller\User;

use Model\Discipline;
use Src\Request;
use Src\View;

class DisciplineView
{
    public function discipline(Request $request): string
    {
        $disciplines = Discipline::where('id', $request->id)->get();
        return (new View())->render('site.discipline-view', ['disciplines' => $disciplines]);
    }
}