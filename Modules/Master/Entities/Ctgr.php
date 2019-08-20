<?php

namespace Modules\Master\Entities;

use Illuminate\Database\Eloquent\Model;

class Ctgr extends Model
{
    protected $fillable     = ["ctgr_name", "ctgr_desc", "ctgr_status_id"];
    protected $table        = "m_ctgr";
    protected $primaryKey   = "ctgr_id";
}
