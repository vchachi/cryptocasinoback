<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferencesToGameDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_details', function (Blueprint $table) {
            $table->foreign('game_type_id')->references('id')->on('game_types');
            $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::table('game_details', function (Blueprint $table) {
            $table->dropForeign(['game_type_id']);
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['user_id']);
        });
    }
}