<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/houses', 'HouseController@store');
    Route::put('/houses/{id}', 'HouseController@update');
    Route::delete('/houses/{id}', 'HouseController@delete');
});

Route::get('/houses', 'HouseController@index');

Route::get('/students', 'StudentController@index');
Route::get('/scores', 'ScoreController@index');
Route::get('/scores/{score}', 'ScoreController@show');
Route::post('/scores', 'ScoreController@store');
Route::get('/calculate', 'ScoreCalculationController@index');
Route::post('/students/search', 'StudentSearchController@index');
