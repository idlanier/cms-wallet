<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Master\Entities\CtgrStatus;

class InitCtgrStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Default data for CtgrStatus
        CtgrStatus::insert([ 'ctgr_status_name' => 'Aktif' ]);
        CtgrStatus::insert([ 'ctgr_status_name' => 'Tidak Aktif' ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        \DB::table('ctgr_status')->delete();
    }
}
