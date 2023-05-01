<?php

namespace Controller\User\Delete;

use Model\Group;
use Src\Request;

class DeleteGroup
{
    public function deleteGroup(Request $request)
    {
        $groups = Group::where('id', $request->id)->first();
        if ($groups->delete()) {
            app()->route->redirect('/');
        }
    }
}