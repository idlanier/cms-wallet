<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtgrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_ctgr', function (Blueprint $table) {
            $table->bigIncrements('ctgr_id');
            $table->string('ctgr_name', 100);
            $table->text('ctgr_desc');
            $table->bigInteger('ctgr_status_id');
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
        Schema::dropIfExists('m_ctgr');
    }
}
