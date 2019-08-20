<?php

namespace Modules\Transaction\Entities;

use Illuminate\Database\Eloquent\Model;

class TrxWallet extends Model
{
    protected $fillable     = ["trx_wallet_code", "trx_wallet_desc", "trx_wallet_amount", "trx_wallet_id", "trx_ctgr_id", "trx_status_id"];
    protected $table        = "trx_wallet";
    protected $primaryKey   = "trx_wallet_id";
}
