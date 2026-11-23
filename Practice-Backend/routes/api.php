<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;


Route::apiResource('teachers', TeacherController::class);
Route::apiResource('modules', ModuleController::class);
Route::apiResource('students', StudentController::class);

Route::post('modules/{module}/teachers', [ModuleController::class, 'assignTeachers']);
Route::get('modules/{module}/students', [ModuleController::class, 'getStudents']);;
