<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', function () {
    return view('main');
});

Route::get('/signUpView', [AuthController::class, 'renderRegisterForm'])->name('signUpView');

Route::post('signUp', [AuthController::class, 'register'])->name('signUp');

Route::get('/loginForm', [AuthController::class, 'renderLoginForm'])->name('loginForm');

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['session.auth']], function () {


    Route::get('/addTask', function () {
        return view('addTask');
    })->name('addTaskView');


    Route::resource('tasks', TaskController::class);

    Route::post('search', [TaskController::class, 'search'])->name('search');

});
