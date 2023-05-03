<?php

namespace Controller\User\Update;

use Model\Group;
use Model\Student;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class UpdateStudent
{
    public function updateStudent(Request $request): string
    {
        $groups = Group::all();
        if ($request->method === 'GET') {
            $students = Student::where('id', $request->id)->first();
        }
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'surname' => ['required', 'unique:students,surname', 'cyrillic'],
                'name' => ['required', 'cyrillic'],
                'patronymic' => ['required', 'cyrillic'],
                'gender' => ['required', 'cyrillic'],
                'date_birth' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'cyrillic' => 'Поле :field должно состоять из кирилици',
            ]);
            if ($validator->fails()) {
                return new View('site.create-student',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'groups' => $groups]);
            }
            $payload = $request->all();
            $students = Student::where('id', $request->id)->update($payload);
            app()->route->redirect('/');
        }

        return (new View())->render('site.update-student', ['students' => $students, 'groups' => $groups]);
    }
}