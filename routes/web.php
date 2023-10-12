<?php

use App\Http\Controllers\Auth\AuthController;
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
    return view('home');
});

Route::get('/signUpView', function () {
    return view('signUp');
})->name('signUpView');

Route::post('signUp',[AuthController::class,'register'])->name('signUp');

Route::get('/login', function () {
    return view('login');
})->name('loginView');

Route::post('login',[AuthController::class,'login'])->name('login');