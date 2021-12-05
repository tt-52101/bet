<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables_tr', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('lang_id');
            $table->timestamps();

            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
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
        Schema::dropIfExists('tables_tr');
    }
}
