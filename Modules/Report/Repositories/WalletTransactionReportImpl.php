<?php
namespace Modules\Report\Repository;

use Modules\Common\Helpers\QueryBuilder;
use Modules\Common\Helpers\CreateNativeQuery;
use Modules\Transaction\Entities\TrxStatus;

/**
 * Repository for Wallet Transaction Report
 */
class WalletTransactionReportImpl implements WalletTransactionReport {

  /**
   * Get Category Advance List
   * @param start_date keyword of searching
   * @param end_date filter status
   * @param transaction_status_list maximal row
   * @param ctgr_id offset
   * @param wallet_id offset
   * @return wallet_transaction_list list of ctgr
   */
  public function getWalletTransactionReport ( $start_date, $end_date, $transaction_status_list, $ctgr_id, $wallet_id ) {

    $list_status_transaction = [];

    $trx_status_masuk = TrxStatus::where('trx_status_name', 'Masuk')->first();
    $trx_status_keluar = TrxStatus::where('trx_status_name', 'Keluar')->first();

    for($i = 0;$i < count($transaction_status_list);$i++){

        if($transaction_status_list[$i] == 'Masuk'){
            array_push($list_status_transaction, $trx_status_masuk->trx_status_id);
        }

        if($transaction_status_list[$i] == 'Keluar'){
            array_push($list_status_transaction, $trx_status_keluar->trx_status_id);
        }

    }

    $queryBuilder = new QueryBuilder();
    $queryBuilder
        ->add(" SELECT ")
        ->add(" A.trx_wallet_date, ")
        ->add(" A.trx_wallet_code, ")
        ->add(" A.trx_wallet_desc, ")
        ->add(" A.trx_wallet_amount, ")
        ->add(" B.wallet_name, ")
        ->add(" C.ctgr_name ")
        ->add(" FROM trx_wallet A ")
        ->add(" JOIN m_wallet B ON A.wallet_id = B.wallet_id ")
        ->add(" JOIN m_ctgr C ON A.ctgr_id = B.ctgr_id ")
        ->add(" WHERE A.trx_wallet_date BETWEEN '".$start_date."' AND '".$end_date."' ")
        ->addIfEquals(count($list_status_transaction), 1, " AND A.trx_status_id = ".$list_status_transaction[1]." ")
        ->addIfEquals(count($list_status_transaction), 2, " AND (A.trx_status_id = ".$list_status_transaction[1]." OR A.trx_status_id = ".$list_status_transaction[2].") ")
        ->addIfNotEquals($ctgr_id, -99, "AND A.wallet_id = ".$ctgr_id." ")
        ->addIfNotEquals($wallet_id, -99, "AND A.wallet_id = ".$wallet_id." ")
        ->add(" ORDER BY A.trx_wallet_date ASC");
        
    // \Log::debug($queryBuilder->toString());
    $query = new CreateNativeQuery($queryBuilder->toString());
    
    $result = $query->getResultList();

    return [
        "wallet_report_list" => $result
    ];
  }

}