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

    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users-fetch', [UserController::class, 'fetch']);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/users/edit/{id}', [UserController::class, 'edit']);
    Route::put('/update/{id}', [UserController::class, 'update']);
    Route::post('/users/change-password/{id}', [UserChangePasswordController::class, 'changePassword']);

    Route::resource('/countries', CountryController::class);
});

Auth::routes();
