<?php

use Src\Route;

Route::add('GET', '', [\Controller\Api\ApiUser::class, 'index']);
Route::add('POST', '/echo', [\Controller\Api\ApiUser::class, 'echo']);
Route::add('POST', '/login', [\Controller\Api\ApiLogin::class, 'login']);
Route::add('POST', '/logout', [\Controller\Api\ApiLogout::class, 'logout']);


Route::add('GET', '/student', [\Controller\Api\ApiStudent::class, 'listStudent'])
    ->middleware('auth', 'can:user');
