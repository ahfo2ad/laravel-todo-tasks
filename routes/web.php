<?php

// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;      // for authentication
use Illuminate\Http\Request;

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

Route::get('/user', 'App\Http\Controllers\userController@index');

    // route for uploading images

Route::post('upload', 'App\Http\Controllers\userController@uploadAvatar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// start todo routes

Route::resource('/todo', 'App\Http\Controllers\TodoController');

// Route::get('/todos', 'App\Http\Controllers\TodoController@index')->name('todo.index');

// Route::get('/todos/create', 'App\Http\Controllers\TodoController@create');

// Route::post('/todos/create', 'App\Http\Controllers\TodoController@store');

// Route::get('/todos/{todo}/edit', 'App\Http\Controllers\TodoController@edit');

// Route::patch('/todos/{todo}/update', 'App\Http\Controllers\TodoController@update')->name('todo.update');

// Route::delete('/todos/{todo}/delete', 'App\Http\Controllers\TodoController@delete')->name('todo.delete');

Route::put('/todos/{todo}/complete', 'App\Http\Controllers\TodoController@complete')->name('todo.complete');

Route::delete('/todos/{todo}/notcomplete', 'App\Http\Controllers\TodoController@notcomplete')->name('todo.notcomplete');




