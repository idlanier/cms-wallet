<?php

namespace Modules\Master\Repository;

interface MasterCtgr {
  
  public function addCtgr ( $ctgr_name, $ctgr_desc, $ctgr_status_id );
  public function getCtgrList ( $keyword, $status, $limit, $offset );
  public function findCtgrById ( $ctgr_id );
  public function editCtgr ( $ctgr_id, $ctgr_name, $ctgr_desc, $ctgr_status_id );
  public function getCtgrStatusList ();

}