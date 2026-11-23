<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherClientController;
use App\Http\Controllers\ModuleClientController;
use App\Http\Controllers\StudentClientController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('profesores', TeacherClientController::class)
    ->parameters(['profesores' => 'id']);

Route::resource('modulos', ModuleClientController::class)
    ->parameters(['modulos' => 'id']);

Route::resource('estudiantes', StudentClientController::class)
    ->parameters(['estudiantes' => 'id']);
