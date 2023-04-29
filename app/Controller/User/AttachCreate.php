<?php

namespace Controller\User;

use Model\Discipline;
use Model\Group;
use Model\GroupDiscipline;
use Src\Request;
use Src\View;

class AttachCreate
{
    public function createAttach(Request $request): string
    {
        if ($request->method === 'POST') {
            GroupDiscipline::create($request->all());
            app()->route->redirect('/');
        }
        $groups = Group::where('id', $request->id)->first();
        $disciplines = Discipline::where('id', $request->id_discipline)->first();
        return (new View())->render('site.attach-group-discipline', ['groups' => $groups, 'disciplines' => $disciplines]);
    }
}