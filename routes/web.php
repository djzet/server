<?php

use Src\Route;


Route::add('GET', '/', [\Controller\User\Home::class, 'home'])
    ->middleware('auth');
Route::add('GET', '/student', [\Controller\User\Students::class, 'showStudents'])
    ->middleware('auth');
Route::add('GET', '/group', [\Controller\User\Groups::class, 'showGroups'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/view', [\Controller\Admin\ViewUser::class, 'view'])
    ->middleware('auth', 'can:admin');

//discipline
Route::add('GET', '/discipline', [\Controller\User\Disciplines::class, 'showGroups'])
    ->middleware('auth');
Route::add('GET', '/discipline-view', [\Controller\User\DisciplineView::class, 'discipline'])
    ->middleware('auth');

//rating
Route::add('GET', '/rating', [\Controller\User\RatingStudent::class, 'rating'])
    ->middleware('auth');
Route::add('GET', '/rating-group', [\Controller\User\RatingView::class, 'ratingView'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/rating-create', [\Controller\User\RatingCreate::class, 'createRating'])
    ->middleware('auth');

//attach
Route::add(['GET'], '/attach', [\Controller\User\Attach::class, 'attach'])
    ->middleware('auth');
Route::add(['GET'], '/attach-group', [\Controller\User\AttachView::class, 'attachView'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/attach-create', [\Controller\User\AttachCreate::class, 'createAttach'])
    ->middleware('auth');

//progress
Route::add('GET', '/progress', [\Controller\User\Progress::class, 'progress'])
    ->middleware('auth');
Route::add('GET', '/progress-group', [\Controller\User\ProgressGroup::class, 'progressGroup'])
    ->middleware('auth');
Route::add('GET', '/group-discipline', [\Controller\User\GroupViewDiscipline::class, 'groupDiscipline'])
    ->middleware('auth');

//update
Route::add(['GET', 'POST'], '/update', [\Controller\User\Update::class, 'update'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/update-student', [\Controller\User\UpdateStudent::class, 'updateStudent'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/update-group', [\Controller\User\UpdateGroup::class, 'updateGroup'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/update-discipline', [\Controller\User\UpdateDiscipline::class, 'updateDiscipline'])
    ->middleware('auth');

//create
Route::add(['GET', 'POST'], '/create', [\Controller\Admin\Create::class, 'create'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/create-student', [\Controller\User\CreateStudent::class, 'createStudent'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/create-group', [\Controller\User\CreateGroup::class, 'createGroup'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/create-discipline', [\Controller\User\CreateDiscipline::class, 'createDiscipline'])
    ->middleware('auth');

//login
Route::add(['GET', 'POST'], '/login', [\Controller\User\Login::class, 'login']);
Route::add('GET', '/logout', [\Controller\User\Logout::class, 'logout']);
