<?php

namespace Controller\User\Create;

use Model\Control;
use Model\Discipline;
use Model\Group;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class CreateDiscipline
{
    public function createDiscipline(Request $request): string
    {
        $controls = Control::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title' => ['required', 'unique:disciplines,title', 'cyrillic'],
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
                return new View('site.create-discipline',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'controls' => $controls]);
            }
            if (Discipline::create($request->all())) {
                app()->route->redirect('/');
            }
        }

        return (new View())->render('site.create-discipline', ['controls' => $controls]);
    }
}