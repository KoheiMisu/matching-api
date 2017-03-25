<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSheduleCategory extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('schedule_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name');
            $table->enum('type', ['practice', 'event']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('schedule_categories');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
