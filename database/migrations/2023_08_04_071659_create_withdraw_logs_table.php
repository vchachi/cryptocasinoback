<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawLogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_logs', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('withdraw_id');
            $table->timestamp('datetime');
            $table->foreignId('user_id');
            $table->float('value', 8, 2);
            $table->integer('tokens');
            $table->string('status', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('withdraw_logs');
    }
}
