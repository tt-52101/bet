<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesTrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies_tr', function (Blueprint $table) {
            $table->id();
            $table->string('comments')->nullable();
            $table->unsignedBigInteger('policy_id');
            $table->unsignedBigInteger('lang_id');
            $table->timestamps();

            $table->foreign('policy_id')->references('id')->on('policies')->onDelete('cascade');
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
        Schema::dropIfExists('policies_tr');
    }
}
