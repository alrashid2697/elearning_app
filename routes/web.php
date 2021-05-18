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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Users Login
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/user', 'UserController@index')->name('user');


// Admin Categories route
Route::get('/admin/createcategory', 'CategoryController@create');
Route::post('/admin/', 'CategoryController@store');
Route::get('/admin/{category}/infocategory','CategoryController@show');
Route::get('/admin/{category}/editcategory','CategoryController@edit');
Route::patch('/admin/{category}','CategoryController@update');
Route::delete('/admin/{category}','CategoryController@destroy');


// Admin User Creation route
Route::get('/admin/listuser', 'AdminController@listUsers');
Route::get('/admin/adduser', 'AdminController@addUser');
Route::post('/admin/listuser/', 'AdminController@createUser');
Route::get('/admin/{user}/edituser', 'AdminController@editUser');
Route::patch('/admin/listuser/{user}', 'AdminController@updateUser');
Route::delete('/admin/listuser/{user}', 'AdminController@destroyUser');













