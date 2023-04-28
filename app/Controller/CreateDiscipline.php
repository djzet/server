<?php

namespace Controller;

use Model\Control;
use Model\Discipline;
use Src\Request;
use Src\View;

class CreateDiscipline
{
    public function createDiscipline(Request $request): string
    {
        //var_dump($request->all());die();
        if ($request->method === 'POST') {
            Discipline::create($request->all());
            app()->route->redirect('/');
        }
        $controls = Control::all();
        return (new View())->render('site.create-discipline', ['controls' => $controls]);
    }
}