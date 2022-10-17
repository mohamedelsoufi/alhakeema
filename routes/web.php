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

//login route
Route::get('login', 'AuthController@login')->name('login');

//proceed login
Route::post('authenticate', 'AuthController@authenticate')->name('authenticate');


Route::middleware(['auth:web'])->group(function () {
    //home page route
    Route::get('/', 'HomeController@index')->name('home');

    //logout route
    Route::get('logout', 'AuthController@logout')->name('logout');

    //user routes
    Route::resource('users','UserController');

    //task routes
    Route::resource('tasks','TaskController');
    Route::get('my-tasks','TaskController@myTasks')->name('tasks.myTasks');
});
