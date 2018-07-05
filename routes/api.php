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
Route::post('password/email', 'Auth\ForgotPasswordController@getResetToken');

Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {
    Route::get('user', 'Api\AuthController@user');
    Route::post('logout', 'Api\AuthController@logout');
});

Route::group(['prefix' => 'profile', 'middleware' => 'jwt.auth'], function () {
    Route::post('uploadImage', 'Api\ProfileController@uploadImage');
    Route::post('updateGoal', 'Api\ProfileController@updateGoal');
});

Route::group(['prefix' => 'sos', 'middleware' => 'jwt.auth'], function () {
    Route::get('initiate', 'Api\SosController@initiate');
});

Route::group(['prefix' => 'calm', 'middleware' => 'jwt.auth'], function () {
    Route::get('', 'Api\CalmController@index');
});

Route::group(['prefix' => 'guardian', 'middleware' => 'jwt.auth'], function () {
	Route::get('', 'Api\GuardianController@index');
	Route::post('store', 'Api\GuardianController@store');
	Route::post('/update/{id}','Api\GuardianController@update');
	Route::delete('delete/{id}','Api\GuardianController@destory');
});

Route::group(['prefix' => 'family', 'middleware' => 'jwt.auth'], function () {
	Route::get('', 'Api\FamilyController@index');
	Route::post('store', 'Api\FamilyController@store');
	Route::post('/update/{id}','Api\FamilyController@update');
	Route::delete('delete/{id}','Api\FamilyController@destory');
});

Route::group(['prefix' => 'advisor', 'middleware' => 'jwt.auth'], function () {
	Route::get('', 'Api\AdvisorController@index');
	Route::post('store', 'Api\AdvisorController@store');
	Route::post('/update/{id}','Api\AdvisorController@update');
	Route::delete('delete/{id}','Api\AdvisorController@destory');
});

Route::group(['prefix' => 'friend', 'middleware' => 'jwt.auth'], function () {
	Route::get('', 'Api\FriendController@index');
	Route::post('store', 'Api\FriendController@store');
	Route::post('/update/{id}','Api\FriendController@update');
	Route::delete('delete/{id}','Api\FriendController@destory');
});

Route::middleware('jwt.refresh')->get('/token/refresh', 'Api\AuthController@refresh');
