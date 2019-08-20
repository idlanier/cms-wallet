<?php

namespace Modules\Transaction\Repository;

interface WalletTransaction {
  
  public function addTrxWalletIn ( $trx_wallet_desc, $trx_wallet_date, $trx_wallet_amount, $wallet_id, $ctgr_id);
  public function addTrxWalletOut ( $trx_wallet_desc, $trx_wallet_date, $trx_wallet_amount, $wallet_id, $ctgr_id );
  public function findTrxWalletById ( $trx_wallet_id );
  public function getTrxList ( $keyword, $limit, $offset );

}