<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) { //create table words

            $table->string('wordFirstLang');  // Column for the word l1
            $table->string('sentenceFirstLang')->nullable();  // Column for the sentence l1
            $table->string('wordSecondLang');  // Column for the word l2
            $table->string('sentenceSecondLang')->nullable();  // Column for the sentence l2
            $table->id();
            $table->timestamps();  // Timestamps to track created and updated times
        });
    }

    public function down()
    {
        Schema::dropIfExists('words');  // Delete table words
    }
};
