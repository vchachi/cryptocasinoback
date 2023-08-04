<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawTicketsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_tickets', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('ticket_id');
            $table->foreignId('withdraw_id');
            $table->foreignId('user_id');
            $table->timestamp('datetime');
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
        Schema::drop('withdraw_tickets');
    }
}
