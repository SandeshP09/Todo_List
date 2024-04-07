<?php

use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', [TodoController::class, 'todo']);

Route::post('/savetask', [TodoController::class, 'todoValid'])->middleware('auth');

Route::get('/edit-todo-{id}', [TodoController::class, 'editTodo'])->middleware('auth');

Route::post('/edittodovalid', [TodoController::class, 'edittodovalid'])->middleware('auth');

Route::get('/delete-todo-{id}', [TodoController::class, 'delTodo'])->middleware('auth');

Route::get('/completed-todo-{id}', [TodoController::class, 'todoCompleted'])->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
