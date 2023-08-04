<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('customer_id');
            $table->timestamp('datetime');
            $table->foreignId('crypto_id');
            $table->float('value', 8, 2);
            $table->integer('tokens');
            $table->string('status', 20);
            $table->foreignId('confirmed_id')->nullable();
            $table->string('withdraw_address', 200);
            $table->string('customer_name', 30);
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
        Schema::drop('withdraws');
    }
}
