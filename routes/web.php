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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::post('/insert-todo', [App\Http\Controllers\todocontroller::class, 'index'])
->name('insert-todo');

Route::delete('/delete-todo/{id}', [App\Http\Controllers\todocontroller::class,'delete'])
->name('delete-todo');

Route::put('/update-todo/{id}', [App\Http\Controllers\todocontroller::class,'update'])
->name('update-todo');

Route::put('/makedone-todo/{id}', [App\Http\Controllers\todocontroller::class,'makedone'])
->name('makedone-todo');
Route::put('/makeundone-todo/{id}', [App\Http\Controllers\todocontroller::class,'makeundone'])
->name('makeundone-todo');