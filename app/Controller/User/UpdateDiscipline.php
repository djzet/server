<?php

namespace Controller\User;

use Model\Control;
use Model\Discipline;
use Src\Request;
use Src\View;

class UpdateDiscipline
{
    public function updateDiscipline(Request $request): string
    {
        //var_dump($request->all());die();
        if ($request->method === 'GET') {
            $disciplines = Discipline::where('id', $request->id)->first();
        }
        if ($request->method === 'POST') {
            $payload = $request->all();
            $disciplines = Discipline::where('id', $request->id)->update($payload);
            app()->route->redirect('/');
        }
        $controls = Control::all();
        return (new View())->render('site.update-discipline', ['disciplines' => $disciplines, 'controls' => $controls]);
    }
}