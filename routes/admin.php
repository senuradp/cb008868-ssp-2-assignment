<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function(){

    // :web is the name of the guard
    // Prevent admins from accessing the register/login page if they are already logged in

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function () {
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/login-admin', [AdminController::class, 'loginAdmin'])->name('login-admin');
        // Route::view('/register','dashboard.admin.register')->name('register');
        // Route::post('/register-admin', [UserController::class, 'registerUser'])->name('register-user');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function () {
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::get('/logout', [AdminController::class, 'logoutAdmin'])->name('logout');
    });

});
