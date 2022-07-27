<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/characters');

Route::resources([
    'characters' => \App\Http\Controllers\CharacterController::class,
    'movies' => \App\Http\Controllers\MovieController::class,
]);
