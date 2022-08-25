<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UseController

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

    Route::middleware(['guest'])->group(function () {});
    // Route::middleware(['auth'])->group(function () {
    //     Route::get('/', [UserController::class, 'index'])->name('index');
    //     Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    //     Route::get('/edit', [UserController::class, 'edit'])->name('edit');
    //     Route::put('/update', [UserController::class, 'update'])->name('update');
    //     Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    // });
    Route::middleware(['auth'])->group(function () {});

});
