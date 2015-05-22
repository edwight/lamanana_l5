<?php


use lamanana\User;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('ver', function(){
 	$user = User::find(1);
});

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::resource('admin', 'AdminController');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
