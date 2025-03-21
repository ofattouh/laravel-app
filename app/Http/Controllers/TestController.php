<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// DB Model classes
use App\Models\TestCategory;
use App\Models\TestPost;

class TestController extends Controller
{
    // returns home view
    public function index()
    {
        // Hard coded
        $allCategories = ['Category 1', 'Category 2'];

        // Fetched from Database using Query Builder
        $allCategoriesDB = DB::table('test_categories')->get();

        // Fetched from Database Model class: TestCategory using Eloquent
        $allCategoriesDB2 = TestCategory::all();

        // Use all() method on TestPost Model OR get latest posts first
        // $posts = TestPost::orderBy('id', 'desc')->get();
        // $posts = TestPost::orderBy('id', 'asc')->get();

        // Alternative syntax for orderBy(): use Eloquent method latest()
        // $posts = TestPost::latest()->get();

        // Does NOT show ALL posts when category isn't selected:
        // Filter posts using where() method and get test_category row from request using request() helper
        // $posts = TestPost::where('test_category_id', request('category_id'))->latest()->get();

        // To Show ALL posts: show ALL categories when category isn't selected
        // Eloquent when() method, accepts where condition as first parameter. If this condition is true,
        // Eloquent will execute a closure function which is second parameter of when() method

        // Meaning: if category_id from requests exists, this where condition closure will be added to query
        $posts = TestPost::when(request('category_id'), function ($query) {
            $query->where('test_category_id', request('category_id'));
        })->latest()->get();


        // The view() helper accepts second parameter as array. Inside home View file, data will be accessible
        // as $categories, $categoriesDB, $categoriesDB2, $posts variables

        return view('home', ['categories' => $allCategories, 'categoriesDB' => $allCategoriesDB,
            'categoriesDB2' => $allCategoriesDB2, 'posts' => $posts]);

        // Using PHP compact(), listing variables one by one only if variables names match array keys
        // $categories = TestCategory::all();
        // return view('home', compact('categories', 'posts'));

        // return view('home');
    }


}


/*

    We use controllers to fetch information from the Database and pass it to the view

    Controllers are created in the app/Http/Controllers folder

    Each controller can have multiple methods for different Routes. The index() method will return the View

    The Model layer is used to fetch data from the database. There are two ways to fetch data:

    First method: using query builder, `DB` facade, table, and calling methods

    Second method: using Eloquent, call all() method on TestCategory Model class to fetch all records from test_categories

    `php artisan make:controller TestController`    // To create controller: TestController class file

*/
