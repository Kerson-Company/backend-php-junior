<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\Api;
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




Route::post('ping', [SistemaController::class, 'ping']);



Route::namespace('Api')->group(function() {



        Route::post('/auth/login', 'AuthController@login');


            Route::post('/auth', 'AuthController@auth');


            Route::group(['middleware' => ['protectedJWT']], function() {

            Route::post('auth/logout', 'AuthController@logout');

            Route::post('/me', 'AuthController@me');

            Route::post('/usuarios/add', 'UserController@add');

            Route::get('/usuarios', 'UserController@list');

            Route::get('/usuarios/{id}', 'UserController@selectUser');

            Route::put('/usuarios/edit/{id}', 'UserController@update');

            Route::delete('/usuarios/delete/{id}', 'UserController@delete');
        });


});



