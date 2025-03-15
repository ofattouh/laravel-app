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
        Schema::create('test_table', function (Blueprint $table) {
            $table->id();           // Default field added by migration artisan command
            $table->string('name'); // Custom added field
            $table->timestamps();   // Default field added by migration artisan command
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // roll back the migration
        Schema::dropIfExists('test_table');
    }
};
