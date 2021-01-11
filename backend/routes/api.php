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

// for User

Route::post('login',[UserController::class,'Login']);
Route::post('signup',[UserController::class,'signup']);
Route::get('logout',[UserController::class,'logout']);

Route::apiResource("user","UserController");


// for courses

Route::apiResource('qcm','QuestionnaireController');
Route::apiResource('question','QuestionController');
Route::apiResource('props','PropositionController');

Route::post('/Courses/addCourse',[CoursesController::class,'addCourses']);
Route::apiResource('Courses','CoursesController');

// for professors

Route::get('/professor/hasCourse',[ProfessorController::class,'hasCourse']);
Route::apiResource('professor','ProfessorController');
