<?php
namespace Modules\Transaction\Repository;

use Modules\Common\Helpers\QueryBuilder;
use Modules\Common\Helpers\CreateNativeQuery;
use Modules\Transaction\Entities\TrxWallet;
use Modules\Transaction\Entities\TrxStatus;

/**
 * Repository for Wallet Transaction
 */
class WalletTransactionImpl implements WalletTransaction {

  /**
   * Add Transaction Wallet In
   * @param trx_wallet_desc transcation wallet description
   * @param trx_wallet_date transaction wallet date
   * @param trx_wallet_amount transaction wallet amount
   * @param wallet_id id of wallet
   * @param ctgr_id id of category
   * @return trx_wallet inserted
   */
  public function addTrxWalletIn ( $trx_wallet_desc, $trx_wallet_date, $trx_wallet_amount, $wallet_id, $ctgr_id) {

    $prefix = "WIN-";
    $datatype = "Transaction Wallet In";

    $query = "SELECT f_gen_autonum(:prefix,:datatype)";

    $params = [
        "prefix" => $prefix,
        "datatype" => $datatype
    ];

    $execute = \DB::select($query,$params);

    $trx_wallet_code = $execute[0]->f_gen_autonum;

    if ($trx_wallet_amount < 0)
    {
	    $trx_wallet_amount = abs($trx_wallet_amount);
    }

    $trx_status = TrxStatus::where('trx_status_name', 'Masuk')->first();
    $trx_status_id = $trx_status->trx_status_id;

    // Init the Transaction Wallet Entity
    $trx_wallet = new TrxWallet();

    // Assign parameter to column value
    $trx_wallet->trx_wallet_code        = $trx_wallet_code;
    $trx_wallet->trx_wallet_desc        = $trx_wallet_desc;
    $trx_wallet->trx_wallet_date        = $trx_wallet_date;
    $trx_wallet->trx_wallet_amount      = $trx_wallet_amount;
    $trx_wallet->wallet_id              = $wallet_id;
    $trx_wallet->ctgr_id                = $ctgr_id;
    $trx_wallet->trx_status_id          = $trx_status_id;

    // Add new row for Transaction Wallet
    $trx_wallet->save();

    return $trx_wallet;
  }

  /**
   * Add Transaction Wallet Out
   * @param trx_wallet_desc transcation wallet description
   * @param trx_wallet_date transaction wallet date
   * @param trx_wallet_amount transaction wallet amount
   * @param wallet_id id of wallet
   * @param ctgr_id id of category
   * @return trx_wallet inserted
   */
  public function addTrxWalletOut ( $trx_wallet_desc, $trx_wallet_date, $trx_wallet_amount, $wallet_id, $ctgr_id ) {

    $prefix = "WOUT-";
    $datatype = "Transaction Wallet Out";

    $query = "SELECT f_gen_autonum(:prefix,:datatype)";

    $params = [
        "prefix" => $prefix,
        "datatype" => $datatype
    ];

    $execute = \DB::select($query,$params);

    $trx_wallet_code = $execute[0]->f_gen_autonum;

    if ($trx_wallet_amount > 0)
    {
	    $trx_wallet_amount = abs($trx_wallet_amount);
    }

    $trx_status = TrxStatus::where('trx_status_name', 'Keluar')->first();
    $trx_status_id = $trx_status->trx_status_id;

    // Init the Transaction Wallet Entity
    $trx_wallet = new TrxWallet();

    // Assign parameter to column value
    $trx_wallet->trx_wallet_code        = $trx_wallet_code;
    $trx_wallet->trx_wallet_desc        = $trx_wallet_desc;
    $trx_wallet->trx_wallet_date        = $trx_wallet_date;
    $trx_wallet->trx_wallet_amount      = $trx_wallet_amount;
    $trx_wallet->wallet_id              = $wallet_id;
    $trx_wallet->ctgr_id                = $ctgr_id;
    $trx_wallet->trx_status_id          = $trx_status_id;

    // Add new row for Transaction Wallet
    $trx_wallet->save();

    return $trx_wallet;
  }

  /**
   * Get Transaction List
   * @param keyword keyword of searching
   * @param limit maximal row
   * @param offset offset
   * @return trx_list list of wallet
   */
  public function getTrxList ( $keyword, $limit, $offset ) {

    $keyword_params = trim(strtoupper($keyword));
    $limit_params   = $limit;
    $offset_params  = ($offset - 1) * $limit;

    $queryBuilder = new QueryBuilder();
    $queryBuilder
        ->add(" SELECT ")
        ->add(" A.trx_wallet_id, ")
        ->add(" A.trx_wallet_code, ")
        ->add(" A.trx_wallet_desc, ")
        ->add(" A.trx_wallet_date, ")
        ->add(" A.trx_wallet_amount, ")
        ->add(" B.wallet_name, ")
        ->add(" C.ctgr_name ")
        ->add(" FROM trx_wallet A ")
        ->add(" JOIN m_wallet B ON A.wallet_id = B.wallet_id ")
        ->add(" JOIN m_ctgr C ON A.ctgr_id = C.ctgr_id ")
        ->add(" WHERE trx_wallet_id != 0 ")
        ->addIfNotEmpty($keyword_params, " AND (A.trx_wallet_date ILIKE '%".$keyword_params."%' OR A.trx_wallet_code ILIKE '%".$keyword_params."%' OR A.trx_wallet_desc ILIKE '%".$keyword_params."%' OR C.ctgr_name ILIKE '%".$keyword_params."%' OR B.wallet_name ILIKE '%".$keyword_params."%' )")
        ->add(" ORDER BY A.trx_wallet_date ")
        ->add(" LIMIT :limit OFFSET :offset ");
        
    // \Log::debug($queryBuilder->toString());
    $query = new CreateNativeQuery($queryBuilder->toString());
    $query->setParameter("limit", $limit_params);
    $query->setParameter("offset", $offset_params);
    
    $result = $query->getResultList();

    return [
        "trx_list" => $result
    ];
  }

  /**
   * Find Transaction Wallet By Id
   * @param trx_wallet_id transaction wallet id
   * @return trx_wallet data
   */
  public function findTrxWalletById ( $trx_wallet_id ){

    // Find Transaction Wallet By Id
    $trx_wallet = TrxWallet::where('trx_wallet_id', $trx_wallet_id)->first();

    return $trx_wallet;
  }

}