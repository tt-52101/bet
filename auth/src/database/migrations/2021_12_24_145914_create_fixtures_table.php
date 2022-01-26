<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('api_id');
            $table->unsignedBigInteger('league_id');
            $table->unsignedBigInteger('country_id');

            $table->unsignedBigInteger('home_id');
            $table->unsignedBigInteger('away_id');

            $table->unsignedBigInteger('home_winner')->nullable();
            $table->unsignedBigInteger('away_winner')->nullable();

            $table->unsignedBigInteger('home_goals')->nullable();
            $table->unsignedBigInteger('away_goals')->nullable();

            $table->timestamp('date');

            $table->foreign('status_id')->references('id')->on('fixture_statuses')->onDelete('cascade');
            $table->foreign('home_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('away_id')->references('id')->on('teams')->onDelete('cascade');

            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
}
