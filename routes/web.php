<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:administrar-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['create','store','show']]);
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-files-users')->group(function(){
    Route::resource('/files', 'FilesAdminController', ['except' => ['show','edit','update','destroy']]);
});

Route::namespace('Users')->prefix('users')->name('users.')->middleware('can:files-users')->group(function(){
    Route::resource('/files', 'FilesController', ['except' => ['show','edit','update','destroy']]);
});
