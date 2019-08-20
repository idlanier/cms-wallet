<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_wallet', function (Blueprint $table) {
            $table->bigIncrements('wallet_id');
            $table->string('wallet_name', 100);
            $table->string('wallet_ref', 100);
            $table->text('wallet_desc');
            $table->bigInteger('wallet_status_id');
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
        Schema::dropIfExists('m_wallet');
    }
}
