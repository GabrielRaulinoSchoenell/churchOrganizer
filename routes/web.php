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

Route::get('/user', 'UserController@index')->name('user');
Route::post('/user', 'UserController@days');
Route::get('/user/update', 'UserController@update')->name('updateProfile');
Route::post('user/update', 'UserController@updateAction');

Route::get('/user/makeTasks' , 'UserController@tasks')->name('makeTasks');
Route::post('/user/makeTasks', 'UserController@setTasks');
Route::post('/user/makeTasks/setTaskInfo', 'UserController@setTaskInfo')->name('taskInfo');

Route::get('/church/create', 'ChurchController@create')->name('createChurch');
Route::post('/church/create', 'ChurchController@createAction');
Route::get('/church/{id}', 'ChurchController@index')->name('church');
Route::put('/church/{id}', 'ChurchController@changeChurchInfo');
Route::get('/church/{id}/config', 'ChurchController@churchConfig')->name('configDays');
Route::post('/church/{id}/config', 'ChurchController@churchConfigAction');

Route::fallback(function(){
    return redirect()->route('home');
});
