<?php

use Illuminate\Support\Facades\Route;

// Add names to routes, and if route URL is changed, no need to change it on every file where it is used because
// changing it here will change it everywhere else

// Instead of closure function, use array parameter: First key will be path to TestController, and second
// parameter will be method defined inside that TestController and route it to View home
Route::get('/', [\App\Http\Controllers\TestController::class, 'index'])->name('home');

// Parameter name postId inside route must match variable name defined inside TestPostController show method
// Route::get('posts/{postId}', [SomeController::class, 'some_method']);
// Route::get('posts/{postId}', [\App\Http\Controllers\TestPostController::class, 'show'])->name('post.show');

// Route Model Binding:
// If record is searched by ID with Eloquent: instead of using postId, pass post, which will be treated as object
Route::get('posts/{post}', [\App\Http\Controllers\TestPostController::class, 'show'])->name('post.show');

// These routes only have static View files without much logic, we use Route::view() instead of Route::get()
Route::view('contact', 'contact')->name('contact');
Route::view('about', 'about')->name('about');


// This view is created using Tailwind
Route::get('/welcome', function () {
    return view('welcome');
});

// Very Basic view
Route::get('/helloworld', function () {
    return view('helloworld');
});


/*

    For Tailwind and modern full-stack projects, assets are placed in resources/js and resources/css folders first
    and then are automatically compiled into /public folder, with commands: npm run dev or npm run build

    Route::view('/', 'home')->name('home');

    Route::get('/', function () {
        return view('home');
    });

    - Short syntax for static pages with just Blade file and without much logic:
    Route::view('/helloworld', 'helloworld');

*/
