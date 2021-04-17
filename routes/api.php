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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'developers'
], function () {

    Route::post('/signup', 'UserController@signupUser');
    Route::post('/login', 'UserController@loginUser');
    Route::post('/update', 'UserController@updateUser');
    Route::get('/delete/{id}', 'UserController@deleteUser');
    Route::get('/getAllUser', 'UserController@getAllUser');
    Route::get('/getUserById/{id}', 'UserController@getUserById');
    Route::post('/deleteMultipleUser', 'UserController@deleteMultipleUser');
    Route::post('/forgotPassword', 'UserController@forgotPassword');
    
});