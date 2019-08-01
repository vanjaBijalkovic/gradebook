<?php

use Illuminate\Http\Request;

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

Route::post('/login','Auth\LoginController@authenticate');

Route::post('/register', 'Auth\RegisterController@register');

Route::middleware('api')->resource('diaries', 'DiaryController');

Route::middleware('api')->post('/diaries/{id}/comments', 'DiaryController@commentStore');

Route::middleware('api')->post('/diaries/{id}/students', 'DiaryController@studentStore');

Route::middleware('api')->resource('professors','ProfessorController');

Route::middleware('api')->resource('comments','CommentController');



