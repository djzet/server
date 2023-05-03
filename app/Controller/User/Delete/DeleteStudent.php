<?php

namespace Controller\User\Delete;

use Model\Student;
use Src\Request;

class DeleteStudent
{
    public function deleteStudent(Request $request)
    {
        $students = Student::where('id', $request->id)->first();
        if ($students->delete()) {
            app()->route->redirect('/');
        }
    }
}