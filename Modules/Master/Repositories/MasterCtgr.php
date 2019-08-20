<?php

namespace Modules\Master\Repository;

interface MasterCtgr {
  
  public function addCtgr ( $ctgr_name, $ctgr_desc, $ctgr_status_id );
  public function getCtgrAdvanceList ( $keyword, $status, $limit, $offset );  
  public function findCtgrById ( $ctgr_id );
  public function editCtgr ( $ctgr_id, $ctgr_name, $ctgr_desc, $ctgr_status_id );
  public function getCtgrStatusList ();
  public function getCtgrList ();
  public function doActiveCtgrStatus ( $ctgr_id );
  public function doNotActiveCtgrStatus ( $ctgr_id );

}