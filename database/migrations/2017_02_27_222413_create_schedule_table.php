<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('schedule', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('team_id')->foreign('team_id')->references('id')->on('team');
//            $table->enum('open_range', ['open', 'closed']);
//            $table->string('location');
//            $table->text('memo')->nullable();
//            $table->dateTime('start_time');
//            $table->dateTime('end_time');
//            $table->integer('last_updated_user_id')->foreign('last_updated_user_id')->references('id')->on('users');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
//        Schema::drop('schedule');
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
