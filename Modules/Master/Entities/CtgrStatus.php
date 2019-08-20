<?php

namespace Modules\Master\Entities;

use Illuminate\Database\Eloquent\Model;

class CtgrStatus extends Model
{
    protected $fillable     = ["ctgr_status_name"];
    protected $table        = "m_ctgr_status";
    protected $primaryKey   = "ctgr_status_id";
}
