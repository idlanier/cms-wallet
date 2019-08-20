<?php

namespace Modules\Master\Entities;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable     = ["wallet_name", "wallet_ref", "wallet_desc", "wallet_status_id"];
    protected $table        = "m_wallet";
    protected $primaryKey   = "wallet_id";
}
