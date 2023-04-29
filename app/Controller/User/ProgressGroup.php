<?php

namespace Controller\User;

use Model\Discipline;
use Model\Group;
use Model\GroupDiscipline;
use Model\RatingDiscipline;
use Model\Student;
use Src\Request;
use Src\View;

class ProgressGroup
{
    public function progressGroup(Request $request): string
    {
        $group_disciplines = GroupDiscipline::where('id_group', $request->id)->get();
        $students = Student::where('group_student', $request->id)->get();
        if ($request->headers['Referer'] === 'http://192.168.13.64/server/') {
            return (new View())->render('site.progress-group', ['group_disciplines' => $group_disciplines]);
        } else {
            $groups = Group::where('id', $request->id)->first();
            $disciplines = Discipline::where('id', $request->id_discipline)->first();
            $discipline_bodys = Discipline::where('id', $request->id_discipline)->get();
            $group_students = Student::where('group_student', $request->id)->first();
            $rating_disciplines = RatingDiscipline::where('id_student', $group_students->id)->where('id_discipline', $request->id_discipline)->get();
            return (new View())->render('site.progress-group-discipline', ['students' => $students, 'groups' => $groups, 'disciplines' => $disciplines, 'discipline_bodys' => $discipline_bodys, 'rating_disciplines' => $rating_disciplines]);
        }
    }

}