<?php

namespace Controller\Api;

use Model\Student;
use Src\View;

class ApiStudent
{
    public function listStudent(): void
    {
        if (app()->auth::user()->token) {
            $students = Student::all()->toArray();
            (new View())->toJSON($students);
        } else {
            (new View())->toJSON(array('Access is denied'));
        }
    }
}