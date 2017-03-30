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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$router->get('/houses', 'HouseController@index');

$router->get('/students', 'StudentController@index');

$router->get('/scores', 'ScoreController@index');
$router->get('/scores/{score}', 'ScoreController@show');
$router->post('/scores', 'ScoreController@store');

$router->get('/calculate', 'ScoreCalculationController@index');
