<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->foreign('user_id')->references('id')->on('users');
            $table->integer('college_id')->foreign('college_id')->references('id')->on('colleges');
            $table->tinyInteger('grade');
            $table->timestamps();
            $table->unique(['user_id', 'college_id'], 'college_user_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('user_profiles');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
