<?php

namespace Controller\Api;

use Model\Student;
use Src\View;

class ApiStudent
{
    public function listStudent(): void
    {
        $students = Student::all()->toArray();

        (new View())->toJSON($students);
    }
}