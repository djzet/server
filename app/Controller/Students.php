<?php

namespace Controller;

use Model\Student;
use Src\View;

class Students
{
    public function showStudents(): string
    {
        $students = Student::all();
        return (new View())->render('site.student', ['students' => $students]);
    }
}