<?php

namespace Controller\User\Create;

use Model\Group;
use Model\Student;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class CreateGroup
{
    public function createGroup(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'number' => ['required', 'unique:groups,number', 'number'],
                'course' => ['required', 'number'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'number' => 'Поле :field должно быть числом',
            ]);
            if ($validator->fails()) {
                return new View('site.create-group',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Group::create($request->all())) {
                app()->route->redirect('/');
            }
        }
        return (new View())->render('site.create-group');
    }
}