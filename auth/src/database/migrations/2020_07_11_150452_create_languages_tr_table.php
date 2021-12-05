<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages_tr', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('lang_id');
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('lang_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages_tr');
    }
}
