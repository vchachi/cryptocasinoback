<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferencesToDepositTicketDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deposit_ticket_details', function (Blueprint $table) {
            $table->foreign('deposit_ticket_id')->references('id')->on('deposit_tickets')->onDelete('cascade');
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
        Schema::table('deposit_ticket_details', function (Blueprint $table) {
            $table->dropForeign(['deposit_ticket_id']);
            $table->dropForeign(['user_id']);
        });
    }
}