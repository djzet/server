<?php

namespace Controller\User\Progress;

use Model\RatingDiscipline;
use Model\Student;
use Src\Request;
use Src\View;

class Progress
{
    public function progress(Request $request): string
    {
        $students = Student::where('id', $request->id)->get();
        $rating_disciplines = RatingDiscipline::where('id_student', $request->id)->get();
        return (new View())->render('site.progress', ['students' => $students, 'rating_disciplines' => $rating_disciplines]);
    }

}