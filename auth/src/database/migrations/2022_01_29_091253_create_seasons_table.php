<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('league_id');
            $table->integer('year');

            $table->dateTime('start');
            $table->dateTime('end');

            $table->boolean('current');

            $table->boolean('standings');
            $table->boolean('players');
            $table->boolean('events');
            $table->boolean('odds');
            $table->boolean('predictions');


            $table->timestamps();

            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
    }
}
