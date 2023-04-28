<?php

namespace Controller;

use Model\Discipline;
use Model\Group;
use Model\GroupDiscipline;
use Src\Request;
use Src\View;

class GroupViewDiscipline
{
    public function groupDiscipline(Request $request): string
    {
        $group_disciplines = GroupDiscipline::where('id_group', $request->id)->get();
        $groups = Group::where('id', $request->id)->first();
        if ($request->headers['Referer'] === 'http://192.168.13.64/server/group') {
            return (new View())->render('site.group-discipline', ['group_disciplines' => $group_disciplines, 'groups' => $groups]);
        } else {
            $group_disciplines_views = Discipline::where('semester', $request->id_semester)->get();
            $semesters = Discipline::where('semester', $request->id_semester)->first();
            return (new View())->render('site.group-discipline-view', ['group_disciplines_views' => $group_disciplines_views, 'groups' => $groups, 'semesters' => $semesters]);
        }
    }
}