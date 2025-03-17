<?php

use Illuminate\Support\Facades\Route;

// These routes only have static View files without much logic, we use Route::view() instead of Route::get()

// Add names to routes, and if route URL is changed, no need to change it on every file where it is used because
// changing it here will change it everywhere else

// Instead of closure function, use array parameter: First key will be path to TestController, and second
// parameter will be method defined inside that TestController and route it to view home

// Route::view('/', 'home')->name('home');
Route::get('/', [\App\Http\Controllers\TestController::class, 'index'])->name('home');

Route::view('contact', 'contact')->name('contact');
Route::view('about', 'about')->name('about');

/*
Route::get('/', function () {
    return view('home');
});
*/

// For Tailwind and modern full-stack projects, assets are placed in resources/js and resources/css folders first
// and then are automatically compiled into /public folder, with commands: npm run dev or npm run build

// This view is created using Tailwind
Route::get('/welcome', function () {
    return view('welcome');
});

// Short syntax: Static pages with just Blade file and without much logic
// OR Route::view('/helloworld', 'helloworld');

// Very Basic view
Route::get('/helloworld', function () {
    return view('helloworld');
});
