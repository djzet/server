<?php

namespace Controller;

use Model\Discipline;
use Model\Group;
use Model\Student;
use Src\View;

class Home
{
    public function home(): string
    {
        $students = Student::all();
        $groups = Group::all();
        $disciplines = Discipline::all();
        // var_dump($students->group); die();
        return (new View())->render('site.home', ['students' => $students, 'groups' => $groups, 'disciplines' => $disciplines]);
    }
}