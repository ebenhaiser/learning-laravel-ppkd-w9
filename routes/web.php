<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
