<?php

use Illuminate\Support\Facades\Route;

// This view is created using BootStrap 5 Template
Route::get('/', function () {
    return view('home');
});

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
