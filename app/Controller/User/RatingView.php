<?php

namespace Controller\User;


use Model\Student;
use Src\Request;
use Src\View;

class RatingView
{
    public function ratingView(Request $request): string
    {
        $group_students = Student::where('group_student', $request->id)->get();
        return (new View())->render('site.rating-group', ['group_students' => $group_students]);
    }
}