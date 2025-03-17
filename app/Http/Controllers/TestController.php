<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// DB Model class
use App\Models\TestCategory;

class TestController extends Controller
{
    // returns home view
    public function index()
    {
        // Hard coded
        $allCategories = ['Category 1', 'Category 2'];

        // Fetched from Database using Query Builder
        $allCategoriesDB = DB::table('test_table')->get();

        // Fetched from Database Model class: TestCategory using Eloquent
        $allCategoriesDB2 = TestCategory::all();

        // The view() helper accepts second parameter as array. Inside home View file, data will be accessible
        // as $categories, $categoriesDB, categoriesDB2 variables
        return view('home', ['categories' => $allCategories, 'categoriesDB' => $allCategoriesDB,
            'categoriesDB2' => $allCategoriesDB2]);

        // return view('home');
    }


}


/*

    We use controllers to fetch information from the Database and pass it to the view

    Controllers are created in the app/Http/Controllers folder

    Each controller can have multiple methods for different Routes. The index() method will return the View

    The Model layer is used to fetch data from the database. There are two ways to fetch data:

    First method using query builder, `DB` facade, table, and calling methods

    Second method using Eloquent, call all() method on TestCategory Model class to fetch all records from test_table

    `php artisan make:controller TestController`    // To create controller class

*/
