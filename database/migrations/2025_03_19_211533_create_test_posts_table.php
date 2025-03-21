<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->foreignId('test_category_id')->constrained(); // relationship between test_posts.id and test_categories.id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_posts');
    }
};

/*
    Use Eloquent Model for test_posts and define relationship where each test_posts row belongs to one of
    test_categories row and link to show each test_posts by selected test_category

    To create foreign keys: use Laravel method foreignId() with constrained() which will create both DB column
    and foreign key relationship

    Name of relation column has format of "xx_id", where "xx" is singular form of relations table: test_categories
    And constrained(), which is shorter Laravel method for: ->references('id')->on('test_categories')

*/
