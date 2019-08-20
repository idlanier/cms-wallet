<?php

namespace Modules\Master\Repository;

interface MasterWallet {
  
  public function addWallet ( $wallet_name, $wallet_ref, $wallet_desc, $wallet_status_id );
  public function getWalletList ( $keyword, $status, $limit, $offset );
  public function findWalletById ( $wallet_id );
  public function editWallet ( $wallet_id, $wallet_name, $wallet_ref, $wallet_desc, $wallet_status_id );
  public function getWalletStatusList ();

}