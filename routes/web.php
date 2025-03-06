<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Added by Omar
// OR Route::view('/helloworld', 'helloworld'); // Static pages with just Blade file and without much logic
Route::get('/helloworld', function () {
    return view('helloworld');
});
