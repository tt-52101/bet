<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicyRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_role', function (Blueprint $table) {
            $table->unsignedBigInteger('policy_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['role_id', 'policy_id']);

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('policy_id')->references('id')->on('policies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policy_role');
    }
}
