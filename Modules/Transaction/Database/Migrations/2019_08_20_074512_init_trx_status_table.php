<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Transcation\Entities\TrxStatus;

class InitTrxStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Default data for TrxStatus
        TrxStatus::insert([ 'trx_status_name' => 'Masuk' ]);
        TrxStatus::insert([ 'trx_status_name' => 'Keluar' ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        \DB::table('trx_status')->delete();
    }
}
