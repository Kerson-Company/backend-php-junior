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

/*
 * Public Routes
 *
 * */
Route::post('/ping','PingController@ping');

Route::post('/auth','AuthController@auth');

/*
 * Auth Routes
 *
 * */

Route::middleware(['auth:api'])->group(function () {

    Route::resource('/users', 'UsersController')->only(['store','update','destroy','show']);

    Route::post('/logout','AuthController@logout');
});




