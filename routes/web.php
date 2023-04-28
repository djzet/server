<?php

use Src\Route;

Route::add('GET', '/', [Controller\Home::class, 'home'])
    ->middleware('auth');
Route::add('GET', '/student', [Controller\Students::class, 'showStudents'])
    ->middleware('auth');
Route::add('GET', '/group', [Controller\Groups::class, 'showGroups'])
    ->middleware('auth');
Route::add('GET', '/discipline', [Controller\Disciplines::class, 'showGroups'])
    ->middleware('auth');


Route::add('GET', '/progress', [Controller\Progress::class, 'progress'])
    ->middleware('auth');
Route::add('GET', '/progress-group', [Controller\ProgressGroup::class, 'progressGroup'])
    ->middleware('auth');
Route::add('GET', '/group-discipline', [Controller\GroupViewDiscipline::class, 'groupDiscipline'])
    ->middleware('auth');

Route::add(['GET', 'POST'], '/update-student', [Controller\UpdateStudent::class, 'updateStudent'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/update-group', [Controller\UpdateGroup::class, 'updateGroup'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/update-discipline', [Controller\UpdateDiscipline::class, 'updateDiscipline'])
    ->middleware('auth');


Route::add(['GET', 'POST'], '/create-student', [Controller\CreateStudent::class, 'createStudent'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/create-group', [Controller\CreateGroup::class, 'createGroup'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/create-discipline', [Controller\CreateDiscipline::class, 'createDiscipline'])
    ->middleware('auth');


Route::add(['GET', 'POST'], '/signup', [Controller\Singup::class, 'signup'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/login', [Controller\Login::class, 'login']);
Route::add('GET', '/logout', [Controller\Logout::class, 'logout']);
