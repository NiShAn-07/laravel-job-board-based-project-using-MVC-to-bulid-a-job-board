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
        Schema::dropIfExists("post");
        Schema::create('post', function (Blueprint $table) {

            $table->uuid('id')->primary(); // UUID - Universally Unique Identifier it cosists of letters and numbers 36 characters 128 bits
            $table->string('title');
            $table->string(column: 'author')->after(column: 'title'); // after keyword is used to specify the position of the new column in the table columans
            $table->string('body');
            $table->boolean('published');
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("post");

        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string(column: 'author')->after(column: 'title'); // after keyword is used to specify the position of the new column in the table columans
            $table->string('body');
            $table->boolean('published');
            $table->timestamps();
        });
    }
};
