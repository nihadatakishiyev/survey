<?php

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

Route::middleware('nicat')->get('/user', function (Request $request) {
    return "Asd";
});
Route::resource('surveys', 'SurveyController');
Route::resource('questions', 'QuestionController');
Route::resource('options', 'OptionController');
Route::middleware('nicat')->resource('answers', 'AnswerController');


Route::get('user/{id}', 'UserController@ans');

Route::get('/token', 'ApiTokenController@update');
