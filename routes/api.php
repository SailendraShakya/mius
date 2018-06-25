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

Route::post('signup', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');

Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {

    Route::get('user', 'Api\AuthController@user');
    Route::post('logout', 'Api\AuthController@logout');

});

Route::group(['prefix' => 'profile', 'middleware' => 'jwt.auth'], function () {
    Route::post('uploadImage', 'Api\ProfileController@uploadImage');
});

Route::group(['prefix' => 'guardian', 'middleware' => 'jwt.auth'], function () {
	Route::get('', 'Api\GuardianController@index');
	Route::post('store', 'Api\GuardianController@store');
	Route::match(['put', 'patch'], '/update/{id}','Api\GuardianController@update');
	// Update article
	// Route::put('update/{id}', 'Api\GuardianController@update');
	Route::delete('delete/{id}','Api\GuardianController@destory');

   });



Route::middleware('jwt.refresh')->get('/token/refresh', 'Api\AuthController@refresh');