<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionshipBetSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championship_bet_slips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('championship_id');
            $table->unsignedBigInteger('odd_id');

            $table->unsignedBigInteger('points')->default(0)->nullable();

            $table->unique(['user_id', 'championship_id', 'odd_id']);
            $table->timestamps();

            $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
            $table->foreign('odd_id')->references('id')->on('odds')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('championship_bet_slips');
    }
}
