<?php

namespace Controller;

use Model\Group;
use Model\Student;
use Src\Request;
use Src\View;
use Model\RatingDiscipline;

class UpdateStudent
{
    public function updateStudent(Request $request): string
    {
        //var_dump($request->all());die();
        if ($request->method === 'GET'){
            $students = Student::where('id', $request->id)->first();
        }
        if ($request->method === 'POST'){
            $payload = $request->all();
            $students = Student::where('id', $request->id)->update($payload);
            app()->route->redirect('/');
        }
        $groups = Group::all();
        return (new View())->render('site.update-student', ['students' => $students, 'groups' => $groups]);
    }
}