<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBalanceLogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_balance_logs', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('customer_id');
            $table->foreignId('user_id');
            $table->timestamp('datetime');
            $table->integer('awarded_tokens');
            $table->integer('taken_tokens');
            $table->string('reason', 255);
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
        Schema::drop('customer_balance_logs');
    }
}
