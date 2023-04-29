<?php

namespace Controller\User;

use Model\Group;
use Src\Request;
use Src\View;

class CreateGroup
{
    public function createGroup(Request $request): string
    {
        //var_dump($request->all());die();
        if ($request->method === 'POST') {
            //$request->group_student = (int) $request->group_student;
            //var_dump($request->all());die();
            Group::create($request->all());
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

        return (new View())->render('site.create-group');
    }
}