<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [PropertyController::class, 'index'])->name('home');
Route::get('/home/property/{id}', [PropertyController::class, 'single'])->name('single.prop');
