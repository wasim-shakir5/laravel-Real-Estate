<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyAgentController;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [PropertyController::class, 'index'])->name('home');
Route::get('/home/property/{id}', [PropertyController::class, 'single'])->name('single.prop');

Route::post('/home/contact-agent', [PropertyAgentController::class, 'submit'])->name('contact.agent.submit');

// routes/web.php

Route::post('/property/save', [PropertyController::class, 'saveProperty'])->name('property.save');
Route::post('/property/unsave', [PropertyController::class, 'unsaveProperty'])->name('property.unsave');

