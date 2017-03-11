<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->foreign('user_id')->references('id')->on('users');
            $table->integer('team_id')->foreign('team_id')->references('id')->on('team')->nullable();
            $table->enum('type', ['captain', 'schedule', 'team']);
            $table->softDeletes();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('user_permissions');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
