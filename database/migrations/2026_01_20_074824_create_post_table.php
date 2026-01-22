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
        Schema::create('post', function (Blueprint $table) {
            
            $table->uuid(column: 'id')->primary(); // UUID - Universally Unique Identifier it cosists of letters and numbers 36 characters 128 bits
            $table->string(column: 'author')->after(column: 'title'); // after keyword is used to specify the position of the new column in the table columans
            $table->string('title');
            $table->string('body');
            $table->boolean('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
