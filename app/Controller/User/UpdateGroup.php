<?php

namespace Controller\User;

use Model\Group;
use Src\Request;
use Src\View;

class UpdateGroup
{
    public function updateGroup(Request $request): string
    {
        //var_dump($request->all());die();
        if ($request->method === 'GET') {
            $groups = Group::where('id', $request->id)->first();
        }
        if ($request->method === 'POST') {
            $payload = $request->all();
            $groups = Group::where('id', $request->id)->update($payload);
            app()->route->redirect('/');
        }
        return (new View())->render('site.update-group', ['groups' => $groups]);
    }
}