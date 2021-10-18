<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('home');

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@handleLogin');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/registration', 'Auth\RegisterController@registration')->name('registration');


Route::get('/login/forgot_password', 'Auth\LoginController@forgot')->name('forgot');
Route::post('/login/forgot_password', 'Auth\LoginController@forgotAction');


Route::get('/confirmation/{email}', 'MainController@confirm')->name('confirmation');
Route::post('/confirmation', 'MainController@confirmAction')->name('confirmAction');

// Route::get('/user/{id}', 'UserController@index')->name('user');
// Route::post('/user/{id}', 'UserController@days');

Route::fallback(function(){
    return redirect()->route('home');
});