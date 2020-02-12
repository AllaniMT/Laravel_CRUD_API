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

Route::get('employees', 'ApiController@getAllEmployees');
Route::post('employees', 'ApiController@createEmployee');
Route::get('employees/{id}', 'ApiController@getEmployee');
Route::put('employees/{id}', 'ApiController@updateEmployee');
Route::delete('employees/{id}','ApiController@deleteEmployee');
