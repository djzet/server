<?php

namespace Controller\User\Update;

use Model\Control;
use Model\Discipline;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class UpdateDiscipline
{
    public function updateDiscipline(Request $request): string
    {
        $controls = Control::all();
        if ($request->method === 'GET') {
            $disciplines = Discipline::where('id', $request->id)->first();
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
                return new View('site.update-discipline',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'controls' => $controls]);
            }
            $payload = $request->all();
            $disciplines = Discipline::where('id', $request->id)->update($payload);
            app()->route->redirect('/');
        }

        return (new View())->render('site.update-discipline', ['disciplines' => $disciplines, 'controls' => $controls]);
    }
}