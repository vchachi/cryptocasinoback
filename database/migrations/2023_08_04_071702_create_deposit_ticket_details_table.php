<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositTicketDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposit_ticket_details', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('deposit_ticket_id');
            $table->foreignId('user_id');
            $table->timestamp('datetime');
            $table->text('text');
            $table->string('status', 20);
            $table->string('confirmation_evidence', 255)->nullable();
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
        Schema::drop('deposit_ticket_details');
    }
}
