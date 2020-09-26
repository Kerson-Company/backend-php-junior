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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/ping','PingController@ping');

Route::post('/auth','AuthController@auth');

Route::post('/users','UsersController@store'); // ok
Route::put('/users/{user}','UsersController@update'); // ok
Route::delete('/user','UsersController@delete'); // to do
Route::get('/users/{user}','UsersController@show'); //ok


/*
 * /user	POST ok
/user	PUT
/user	DELETE
/user/{:id}	GET ok
*/

//Route::resource('user', 'UsersController');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    /*Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');*/



});




