<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferencesToCryptoPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crypto_prices', function (Blueprint $table) {
            $table->foreign('crypto_id')->references('id')->on('cryptos')->onDelete('cascade');
        });
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crypto_prices', function (Blueprint $table) {
            $table->dropForeign(['crypto_id']);
        });
    }
}