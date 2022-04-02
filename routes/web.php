<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\User\UserChangePasswordController;
use App\Http\Controllers\Admin\CountryController;


Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::post('/users', [UserController::class, 'store']);

    Route::post('/users', [UserController::class, 'store'])
        ->name('users.store');
    Route::get('/users-fetch', [UserController::class, 'fetch']);
    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');
    // Route::post('/users', [UserChangePasswordController::class, 'changePassword'])
    //     ->name('users.change-password');

    Route::resource('/countries', CountryController::class);
});

Auth::routes();
