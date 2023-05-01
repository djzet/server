<?php

namespace Controller\User\Attach;

use Model\Discipline;
use Model\Group;
use Model\GroupDiscipline;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class AttachCreate
{
    public function createAttach(Request $request): string
    {
        $groups = Group::where('id', $request->id)->first();
        $disciplines = Discipline::where('id', $request->id_discipline)->first();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'id_group' => ['required'],
                'id_discipline' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);
            if ($validator->fails()) {
                return new View('site.attach-group-discipline',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'groups' => $groups, 'disciplines' => $disciplines]);
            }
            if (GroupDiscipline::create($request->all())) {
                app()->route->redirect('/');
            }
        }

        return (new View())->render('site.attach-group-discipline', ['groups' => $groups, 'disciplines' => $disciplines]);
    }
}