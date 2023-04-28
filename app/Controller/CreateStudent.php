<?php

namespace Controller;

use Model\Group;
use Model\Student;
use Src\Request;
use Src\View;

class CreateStudent
{
    public function createStudent(Request $request): string
    {
        $groups = Group::all();
        //var_dump($request->all());die();
        if ($request->method === 'POST') {
            //$request->group_student = (int) $request->group_student;
            //var_dump($request->all());die();
            Student::create($request->all());
//            $student = new Student();
//            $student->surname = $request->surname;
//            $student->name = $request->name;
//            $student->patronymic = $request->patronymic;
//            $student->gender = $request->gender;
//            $student->date_birth = $request->date_birth;
//            $student->group_student = $request->group_student;
//            $student->save();

            app()->route->redirect('/');
        }

        return (new View())->render('site.create-student', ['groups' => $groups]);
    }
}