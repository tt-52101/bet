<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odds', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fixture_id');
            $table->unsignedBigInteger('bookmaker_id');
            $table->unsignedBigInteger('bet_category_id');
            $table->string('value');
            $table->float('odd');
            $table->timestamps();

            $table->foreign('fixture_id')->references('id')->on('fixtures')->onDelete('cascade');
            $table->foreign('bookmaker_id')->references('id')->on('bookmakers')->onDelete('cascade');
            $table->foreign('bet_category_id')->references('id')->on('bet_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odds');
    }
}
