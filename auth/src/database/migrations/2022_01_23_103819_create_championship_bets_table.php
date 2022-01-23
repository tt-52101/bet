<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionshipBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championship_bets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('championship_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('fixture_id');
            $table->unsignedBigInteger('odd_id');

            $table->float('odd', 8,2)->unsigned()->default(1)->nullable();
            $table->float('points', 8,2)->unsigned()->default(1)->nullable();
            $table->float('return', 8,2)->unsigned()->default(0)->nullable();

            $table->unsignedTinyInteger('status')->default('0');

            $table->timestamps();

            $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
            $table->foreign('fixture_id')->references('id')->on('fixtures')->onDelete('cascade');
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
        Schema::dropIfExists('championship_bets');
    }
}
