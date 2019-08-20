<?php

namespace Modules\Transaction\Entities;

use Illuminate\Database\Eloquent\Model;

class TrxStatus extends Model
{
    protected $fillable     = ["trx_status_name"];
    protected $table        = "trx_status";
    protected $primaryKey   = "trx_status_id";
}
