<?php

namespace Controller\User;

use Model\Group;
use Model\GroupDiscipline;
use Model\RatingDiscipline;
use Model\Student;
use Src\Request;
use Src\View;

class RatingCreate
{
    public function createRating(Request $request): string
    {
        if ($request->method === 'POST') {
            RatingDiscipline::create($request->all());
            app()->route->redirect('/');
        }
        $student_names = Student::where('id', $request->id_student)->first();
        $students = Student::where('id', $request->id_student)->first();
        $groups = Group::where('id', $request->id)->first();
        $rating_disciplines = RatingDiscipline::where('id_student', $request->id_student)->first();
        $group_disciplines = GroupDiscipline::where('id_group', $request->id)->get();
        return (new View())->render('site.rating-group-student', ['student_names' => $student_names, 'students' => $students, 'groups' => $groups, 'rating_disciplines' => $rating_disciplines, 'group_disciplines' => $group_disciplines]);
    }
}