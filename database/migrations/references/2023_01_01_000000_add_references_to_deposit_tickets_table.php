<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferencesToDepositTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deposit_tickets', function (Blueprint $table) {
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->foreign('deposit_id')->references('id')->on('deposits');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deposit_tickets', function (Blueprint $table) {
            $table->dropForeign(['ticket_id']);
            $table->dropForeign(['deposit_id']);
            $table->dropForeign(['user_id']);
        });
    }
}