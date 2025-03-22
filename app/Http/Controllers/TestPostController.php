<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// DB Model class
use App\Models\TestPost;

class TestPostController extends Controller
{

    // First method:
    // With type hint that TestPost is Model object, define the parameter as $post and database search
    // is done automatically by Laravel under the hood and no need to call find() method on Model TestPost

    // Using this method inside route is called: Route Model Binding because it binds Model by type hinting
    // Model object:TestPost type with parameter:post in route. And show 404 page if record is not found

    public function show(TestPost $post)
    {

        // Return View post.blade.php and pass it this `$post`
        return view('post', compact('post'));
    }
}

/*

    - Second method: To parse parameters for URL: example.com/posts/1234 where 1234 is the ID of the post
    public function show($postId)
    {
        - Use `find()` method of Eloquent Model and pass `$postId` to find `post` by ID
        $post = TestPost::find($postId);

        return view('post', compact('post'));
    }

    php artisan make:controller TestPostController      // Create Controller TestPost

    https://laraveldaily.com/lesson/laravel-beginners/route-parameters-route-model-binding

*/
