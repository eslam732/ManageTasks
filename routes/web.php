<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Echo_;

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
    return view('main');
});

Route::get('/signUpView', function () {
    return view('signUp');
})->name('signUpView');

Route::post('signUp',[AuthController::class,'register'])->name('signUp');

Route::get('/login', function () {
    return view('login');
})->name('loginView');

Route::post('login',[AuthController::class,'login'])->name('login');

Route::middleware(['session.auth'])->get('/addTask', function () {
    return view('addTask');
})->name('addTaskView');


Route::get('/tasks', [TaskController::class,'index'])->name('tasks');

Route::post('addTask',[TaskController::class,'createTask'])->name('addTask');