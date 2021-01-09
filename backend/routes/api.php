<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// for student

Route::post('signup',[EtudiantController::class,'signup']);
Route::post('login',[EtudiantController::class,'Login']);
Route::get('logout',[EtudiantController::class,'logout']);

Route::apiResource("student","EtudiantController");


// for courses

Route::post('/courses/addCourse',[ProfessorController::class,'addCourse']);
Route::get('courses/allCourses',[CoursesController::class,'GetAllCourses']);
Route::get('courses/{Courses}',[CoursesController::class,'getByTitle']);
Route::apiResource('Courses','CoursesController');

// for professors

Route::get('/professor/hasCourse',[ProfessorController::class,'HasCourse']);
Route::apiResource('professor','ProfessorController');
