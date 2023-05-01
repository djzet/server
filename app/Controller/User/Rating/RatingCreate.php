<?php

namespace Controller\User\Rating;

use Model\Group;
use Model\GroupDiscipline;
use Model\RatingDiscipline;
use Model\Student;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class RatingCreate
{
    public function createRating(Request $request): string
    {
        $student_names = Student::where('id', $request->id_student)->first();
        $students = Student::where('id', $request->id_student)->first();
        $groups = Group::where('id', $request->id)->first();
        $rating_disciplines = RatingDiscipline::where('id_student', $request->id_student)->first();
        $group_disciplines = GroupDiscipline::where('id_group', $request->id)->get();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'id_discipline' => ['required'],
                'rating' => ['required', 'number', 'count'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'number' => 'Поле :field должно быть числом',
                'count' => 'Поле :field должно быть цифрой от 1 до 5',
            ]);
            if ($validator->fails()) {
                return new View('site.rating-group-student',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'student_names' => $student_names, 'students' => $students, 'groups' => $groups, 'rating_disciplines' => $rating_disciplines, 'group_disciplines' => $group_disciplines]);
            }
            if (RatingDiscipline::create($request->all())) {
                app()->route->redirect('/');
            }
        }
        return (new View())->render('site.rating-group-student', ['student_names' => $student_names, 'students' => $students, 'groups' => $groups, 'rating_disciplines' => $rating_disciplines, 'group_disciplines' => $group_disciplines]);
    }
}