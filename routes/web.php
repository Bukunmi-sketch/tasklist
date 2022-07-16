<?php

use App\Http\Controllers\TaskController;
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
/*
Route::get('/', function () {
    return view('tasks.index');
});
*/
Route::get('/', "App\Http\Controllers\TaskController@index");
Auth::routes();


Route::get('/tasks', "App\Http\Controllers\TaskController@index");
Route::post("/task", "App\Http\Controllers\TaskController@store");
Route::delete('/task/{task}', [TaskController::class, "destroy"]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
