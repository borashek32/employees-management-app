<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('main');


// COMMON DASHBOARD
Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'home'])
    ->name('home');

// USER DASHBOARD


// ADMIN DASHBOARD
Route::prefix('admin')->name('admin.')->group(function() {

  Route::get('/users', [App\Http\Controllers\Admin\User\UserController::class, 'index'])
      ->name('users.index');
  Route::get('/users-fetch', [App\Http\Controllers\Admin\User\UserController::class, 'fetch']);
  Route::post('/users', [App\Http\Controllers\Admin\User\UserController::class, 'store']);
  Route::get('/users/{id}', [App\Http\Controllers\Admin\User\UserController::class, 'show']);
  Route::get('/users/edit/{id}', [App\Http\Controllers\Admin\User\UserController::class, 'edit']);
  Route::put('/update/{id}', [App\Http\Controllers\Admin\User\UserController::class, 'update']);
  Route::post('/users/change-password/{id}', [App\Http\Controllers\Admin\User\UserChangePasswordController::class, 'changePassword']);
  Route::delete('/users/delete/{id}', [App\Http\Controllers\Admin\User\UserController::class, 'deleteUser']);
  Route::post('/users/search', [App\Http\Controllers\Admin\User\UserSearchController::class, 'search']);

  Route::get('/countries', [App\Http\Controllers\Admin\Country\CountryController::class, 'index'])
      ->name('countries.index');
  Route::get('/countries-fetch', [App\Http\Controllers\Admin\Country\CountryController::class, 'fetch']);
  Route::post('/countries', [App\Http\Controllers\Admin\Country\CountryController::class, 'store']);
  Route::get('/countries/{id}', [App\Http\Controllers\Admin\Country\CountryController::class, 'show']);
  Route::get('/countries/edit/{id}', [App\Http\Controllers\Admin\Country\CountryController::class, 'edit']);
  Route::put('/countries/update/{id}', [App\Http\Controllers\Admin\Country\CountryController::class, 'update']);
  Route::delete('/countries/delete/{id}', [App\Http\Controllers\Admin\Country\CountryController::class, 'delete']);
  Route::post('/countries/search', [App\Http\Controllers\Admin\Country\CountrySearchController::class, 'search']);

  Route::get('/states', [App\Http\Controllers\Admin\State\StateController::class, 'index'])
    ->name('states.index');
  Route::get('/states-fetch', [App\Http\Controllers\Admin\State\StateController::class, 'fetch']);
  Route::get('/states-create', [App\Http\Controllers\Admin\State\StateController::class, 'create']);
  Route::post('/states', [App\Http\Controllers\Admin\State\StateController::class, 'store']);
  Route::get('/states/{id}', [App\Http\Controllers\Admin\State\StateController::class, 'show']);
});

Auth::routes();
