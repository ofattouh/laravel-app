<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestPost extends Model
{
    //
}


/*
    Eloquent Model is used for posts and there is relationship where each post belong to one of the categories.
    Inside the page, a link will show posts by the selected category

    Useful DB commands:

    `php artisan make:model TestPost -m` // Create Model:TestPost class file and Migration:test-posts table file (2 artisan commands)

    `php artisan migrate`                // Run migrations files


    https://laraveldaily.com/lesson/laravel-beginners/second-model-get-parameters-eloquent

*/

