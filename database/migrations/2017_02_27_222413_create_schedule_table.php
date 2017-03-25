<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->foreign('team_id')->references('id')->on('teams');
            $table->integer('category_id')->foreign('category_id')->references('id')->on('schedule_categories');
            $table->enum('scope', ['open', 'closed'])->comment('公開範囲');
            $table->string('location');
            $table->text('memo')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('last_updated_user_id')->foreign('last_updated_user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('schedules');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
