<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PropertyController, PropertyAgentController, CommonController, UsersController};

Auth::routes();

Route::controller(PropertyController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/properties/filter', 'filterProperties')->name('properties.filter');
    Route::get('/property/{id}', 'single')->name('single.prop');
    Route::post('/property/save', 'saveProperty')->name('property.saver');
    Route::get('/property/type/{type}', 'showByType')->name('property.type');
    Route::get('/property/home-type/{hometype}', 'showByHomeType')->name('property.hometype');
});

Route::controller(PropertyAgentController::class)->group(function () {
    Route::post('/contact-agent', 'submit')->name('contact.agent.submit');
});

Route::controller(CommonController::class)->group(function () {
    Route::match(['GET', 'POST'], '/contact', 'contact')->name('contact');
    Route::get('/about-us', 'about')->name('about');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/requested-property', 'requested_property')->name('requested.property');
    Route::get('/liked-property', 'liked_property')->name('liked.property');
});
