<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('role_id');

            $table->boolean('create')->default(false)->nullable();
            $table->boolean('read')->default(false)->nullable();
            $table->boolean('update')->default(false)->nullable();
            $table->boolean('delete')->default(false)->nullable();
            $table->boolean('own')->default(true)->nullable();
            $table->timestamps();

            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policies');
    }
}
