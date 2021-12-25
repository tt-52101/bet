<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionshipLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championship_leagues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('championship_id');
            $table->unsignedBigInteger('league_id');
            $table->timestamps();

            $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
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
        Schema::dropIfExists('championship_leagues');
    }
}
