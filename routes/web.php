<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){

    // :web is the name of the guard
    // Prevent users from accessing the register/login page if they are already logged in

    Route::middleware(['guest:web','PreventBackHistory'])->group(function () {
        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
        Route::post('/register-user', [UserController::class, 'registerUser'])->name('register-user');
        Route::post('/login-user', [UserController::class, 'loginUser'])->name('login-user');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function () {
        Route::view('/home','dashboard.user.home')->name('home');
        Route::get('/logout', [UserController::class, 'logoutUser'])->name('logout');
    });

});
