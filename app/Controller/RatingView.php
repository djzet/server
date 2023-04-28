<?php

namespace Controller;


use Model\Discipline;
use Model\Group;
use Model\GroupDiscipline;
use Model\RatingDiscipline;
use Model\Student;
use Src\Request;
use Src\View;

class RatingView
{
    public function ratingView(Request $request): string
    {

        if ($request->headers['Referer'] === 'http://192.168.13.64/server/rating') {
            $group_students = Student::where('group_student', $request->id)->get();
            return (new View())->render('site.rating-group', ['group_students' => $group_students]);
        } else {
            $student_names = Student::where('id', $request->id_student)->first();
            $students = Student::where('id', $request->id_student)->get();
            $groups = Group::where('id', $request->id)->first();
            $rating_disciplines = RatingDiscipline::where('id_student', $request->id_student)->get();
            return (new View())->render('site.rating-group-student', ['student_names' => $student_names, 'students' => $students, 'groups' => $groups, 'rating_disciplines' => $rating_disciplines]);
        }
    }
}