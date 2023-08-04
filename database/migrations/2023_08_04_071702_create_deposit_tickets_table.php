<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositTicketsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposit_tickets', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('ticket_id');
            $table->foreignId('deposit_id');
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
        Schema::drop('deposit_tickets');
    }
}
