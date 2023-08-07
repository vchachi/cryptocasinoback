<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferencesToGameLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_logs', function (Blueprint $table) {
            $table->foreign('game_detail_id')->references('id')->on('game_details');
        });
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_logs', function (Blueprint $table) {
            $table->dropForeign(['game_detail_id']);
        });
    }
}