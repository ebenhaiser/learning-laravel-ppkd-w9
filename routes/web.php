<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransOrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [loginController::class, 'index']);
Route::get('login', [loginController::class, 'index'])->name('login');
Route::post('actionLogin', [loginController::class, 'actionLogin'])->name('actionLogin');
Route::get('logout', [loginController::class, 'logout'])->name('logout');

// grouping routing setelah login
Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('trans_order', TransOrderController::class);

    Route::get('get-paket/{id}', [TransOrderController::class, 'getPaket'])->name('get-pake');
});

Route::get('latihan', [LearningController::class, 'index']);
Route::get('edit/{id}', [LearningController::class, 'edit'])->name('edit');
Route::get('delete/{id}', [LearningController::class, 'delete'])->name('delete');

Route::get('calculator', [CalculatorController::class, 'index'])->name('index');
Route::get('plus', [CalculatorController::class, 'plus'])->name('plus');
Route::get('minus', [CalculatorController::class, 'minus'])->name('minus');
Route::get('multiply', [CalculatorController::class, 'multiply'])->name('multiply');
Route::get('divide', [CalculatorController::class, 'divide'])->name('divide');

Route::post('result', [CalculatorController::class, 'calculate'])->name('result');

Route::resource('user', UsersController::class);
Route::get('delete/{id}', [UsersController::class, 'delete'])->name('delete');

//
