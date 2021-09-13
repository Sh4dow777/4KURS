<?php

use Illuminate\Http\Request;

Route::get('/get Student','StudentsController@GetStudent');
Route::post('/add Student','StudentsController@AddStudent');
Route::patch('/update Student','StudentsController@UpdateStudent');
Route::delete('/delete Student','StudentsController@DeleteStudent');
Route::post('/registration Student','StudentsController@RegistrationStudent');
Route::post('/authorization Student','StudentsController@AuthorizationStudent');