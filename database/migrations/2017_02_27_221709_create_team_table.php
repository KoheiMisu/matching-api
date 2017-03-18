<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('college_id')->foreign('college_id')->references('id')->on('college');
            $table->string('name');
            $table->string('profile_image_path')->nullable();
            $table->string('gender_ratio'); //男女比
            $table->string('drinking_ratio'); //飲み会比率
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
        Schema::drop('teams');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
