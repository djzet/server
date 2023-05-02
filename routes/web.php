<?php

use Src\Route;


Route::add('GET', '/', [\Controller\User\Home::class, 'home'])
    ->middleware('auth');
Route::add('GET', '/student', [\Controller\User\Students::class, 'showStudents'])
    ->middleware('auth');
Route::add('GET', '/group', [\Controller\User\Group\Groups::class, 'showGroups'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/view', [\Controller\Admin\ViewUser::class, 'view'])
    ->middleware('auth', 'can:admin');

//discipline
Route::add('GET', '/discipline', [\Controller\User\Discipline\Disciplines::class, 'showGroups'])
    ->middleware('auth');
Route::add('GET', '/discipline-view', [\Controller\User\Discipline\DisciplineView::class, 'discipline'])
    ->middleware('auth');

//rating
Route::add('GET', '/rating', [\Controller\User\Rating\RatingStudent::class, 'rating'])
    ->middleware('auth', 'can:user');
Route::add('GET', '/rating-group', [\Controller\User\Rating\RatingView::class, 'ratingView'])
    ->middleware('auth', 'can:user');
Route::add(['GET', 'POST'], '/rating-create', [\Controller\User\Rating\RatingCreate::class, 'createRating'])
    ->middleware('auth', 'can:user');

//attach
Route::add(['GET'], '/attach', [\Controller\User\Attach\Attach::class, 'attach'])
    ->middleware('auth', 'can:user');
Route::add(['GET'], '/attach-group', [\Controller\User\Attach\AttachView::class, 'attachView'])
    ->middleware('auth', 'can:user');
Route::add(['GET', 'POST'], '/attach-create', [\Controller\User\Attach\AttachCreate::class, 'createAttach'])
    ->middleware('auth', 'can:user');

//progress
Route::add('GET', '/progress', [\Controller\User\Progress\Progress::class, 'progress'])
    ->middleware('auth');
Route::add('GET', '/progress-group', [\Controller\User\Progress\ProgressGroup::class, 'progressGroup'])
    ->middleware('auth');
Route::add('GET', '/group-discipline', [\Controller\User\Group\GroupViewDiscipline::class, 'groupDiscipline'])
    ->middleware('auth');

//update
Route::add(['GET', 'POST'], '/update', [\Controller\Admin\Update::class, 'update'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/update-student', [\Controller\User\Update\UpdateStudent::class, 'updateStudent'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/update-group', [\Controller\User\Update\UpdateGroup::class, 'updateGroup'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/update-discipline', [\Controller\User\Update\UpdateDiscipline::class, 'updateDiscipline'])
    ->middleware('auth');

//create
Route::add(['GET', 'POST'], '/create', [\Controller\Admin\Create::class, 'create'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/create-student', [\Controller\User\Create\CreateStudent::class, 'createStudent'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/create-group', [\Controller\User\Create\CreateGroup::class, 'createGroup'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/create-discipline', [\Controller\User\Create\CreateDiscipline::class, 'createDiscipline'])
    ->middleware('auth');

//login
Route::add(['GET', 'POST'], '/login', [\Controller\User\Login::class, 'login']);
Route::add('GET', '/logout', [\Controller\User\Logout::class, 'logout'])
    ->middleware('auth');

//delete
Route::add(['GET', 'POST'], '/delete', [\Controller\Admin\Delete::class, 'deleteUser'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/delete-student', [\Controller\User\Delete\DeleteStudent::class, 'deleteStudent'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/delete-group', [\Controller\User\Delete\DeleteGroup::class, 'deleteGroup'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/delete-discipline', [\Controller\User\Delete\DeleteDiscipline::class, 'deleteDiscipline'])
    ->middleware('auth');