<?php

namespace Controller\User\Create;

use Model\Group;
use Model\Student;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class CreateStudent
{
    public function createStudent(Request $request): string
    {
        $groups = Group::all();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'surname' => ['required', 'unique:students,surname', 'cyrillic'],
                'name' => ['required', 'cyrillic'],
                'patronymic' => ['required', 'cyrillic'],
                'gender' => ['required', 'cyrillic'],
                'date_birth' => ['required', 'unique:students,date_birth'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'cyrillic' => 'Поле :field должно состоять из кирилици',
            ]);
            if ($validator->fails()) {
                return new View('site.create-student',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'groups' => $groups]);
            }
            if (Student::create($request->all())) {
                app()->route->redirect('/');
            }
        }

        return (new View())->render('site.create-student', ['groups' => $groups]);
    }
}