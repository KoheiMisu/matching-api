<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->foreign('user_id')->references('id')->on('users');
            $table->integer('team_id')->foreign('team_id')->references('id')->on('team')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('team_users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
