<?php

namespace Controller\User\Delete;

use Model\Discipline;
use Src\Request;

class DeleteDiscipline
{
    public function deleteDiscipline(Request $request)
    {
        $disciplines = Discipline::where('id', $request->id)->first();
        if ($disciplines->delete()) {
            app()->route->redirect('/');
        }
    }
}