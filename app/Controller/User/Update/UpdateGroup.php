<?php

namespace Controller\User\Update;

use Model\Group;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class UpdateGroup
{
    public function updateGroup(Request $request): string
    {
        if ($request->method === 'GET') {
            $groups = Group::where('id', $request->id)->first();
        }
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title' => ['required', 'cyrillic'],
                'semester' => ['required', 'number'],
                'hours' => ['required', 'number'],
                'control' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'cyrillic' => 'Поле :field должно состоять из кирилици',
                'number' => 'Поле :field должно быть числом',
            ]);
            if ($validator->fails()) {
                return new View('site.update-group',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            $payload = $request->all();
            $groups = Group::where('id', $request->id)->update($payload);
            app()->route->redirect('/');
        }
        return (new View())->render('site.update-group', ['groups' => $groups]);
    }
}