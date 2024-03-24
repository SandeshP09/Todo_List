<?php

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

Route::post('/savetask', [TodoController::class, 'todoValid']);

Route::get('/edit-todo-{id}',[TodoController::class, 'editTodo']);

Route::post('/edittodovalid', [TodoController::class, 'edittodovalid']);

Route::get('/delete-todo-{id}', [TodoController::class, 'delTodo']);

Route::get('/completed-todo-{id}',[TodoController::class, 'todoCompleted']);