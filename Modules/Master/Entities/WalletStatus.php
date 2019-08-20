<?php

namespace Modules\Master\Entities;

use Illuminate\Database\Eloquent\Model;

class WalletStatus extends Model
{
    protected $fillable     = ["wallet_status_name"];
    protected $table        = "m_wallet_status";
    protected $primaryKey   = "wallet_status_id";
}
