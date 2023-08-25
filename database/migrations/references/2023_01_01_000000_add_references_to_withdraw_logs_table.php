<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferencesToWithdrawLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdraw_logs', function (Blueprint $table) {
            $table->foreign('withdraw_id')->references('id')->on('withdraws')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('withdraw_logs', function (Blueprint $table) {
            $table->dropForeign(['withdraw_id']);
            $table->dropForeign(['user_id']);
        });
    }
}