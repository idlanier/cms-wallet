<?php

namespace Modules\Report\Repository;

interface WalletTransactionReport {
  
  public function getWalletTransactionReport ( $start_date, $end_date, $transaction_status_list, $ctgr_id, $wallet_id );

}