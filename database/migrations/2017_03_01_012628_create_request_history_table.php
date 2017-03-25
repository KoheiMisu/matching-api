<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestHistoryTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('request_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id')->foreign('request_id')->references('id')->on('team_requests');
            $table->enum('result', ['approval', 'rejection'])->comment('申請結果');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('request_histories');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
