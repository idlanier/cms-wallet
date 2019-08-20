<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Master\Entities\WalletStatus;

class InitWalletStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Default data for WalletStatus
        WalletStatus::insert([ 'wallet_status_name' => 'Aktif' ]);
        WalletStatus::insert([ 'wallet_status_name' => 'Tidak Aktif' ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        \DB::table('wallet_status')->delete();
    }
}
