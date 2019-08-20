<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrxWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_wallet', function (Blueprint $table) {
            $table->bigIncrements('trx_wallet_id');
            $table->string('trx_wallet_code', 50);
            $table->text('trx_wallet_desc');
            $table->string('trx_wallet_date', 8);
            $table->bigInteger('trx_wallet_amount');
            $table->bigInteger('wallet_id');
            $table->bigInteger('ctgr_id');
            $table->bigInteger('trx_status_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trx_wallet');
    }
}
