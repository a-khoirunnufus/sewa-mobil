<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

    Route::get('/cars', [App\Http\Controllers\CarController::class, 'index'])->name('cars.index');
    Route::post('/cars', [App\Http\Controllers\CarController::class, 'store'])->name('cars.store');
    Route::get('/cars/create', [App\Http\Controllers\CarController::class, 'create'])->name('cars.create');

    Route::get('/car-rentals', [App\Http\Controllers\CarRentalController::class, 'index'])->name('car-rentals.index');
    Route::post('/car-rentals', [App\Http\Controllers\CarRentalController::class, 'store'])->name('car-rentals.store');
    Route::get('/car-rentals/create', [App\Http\Controllers\CarRentalController::class, 'create'])->name('car-rentals.create');
});
