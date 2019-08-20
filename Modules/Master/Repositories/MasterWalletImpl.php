<?php
namespace Modules\Master\Repository;

use Modules\Common\Helpers\QueryBuilder;
use Modules\Common\Helpers\CreateNativeQuery;
use Modules\Master\Entities\Wallet;
use Modules\Master\Entities\WalletStatus;

/**
 * Repository for Master Wallet
 */
class MasterWalletImpl implements MasterWallet {

  /**
   * Add Wallet
   * @param wallet_name wallet name 
   * @param wallet_ref reference of the wallet
   * @param wallet_desc description of the wallet
   * @param wallet_status_id wallet status from table wallet_status
   * @return wallet inserted
   */
  public function addWallet ( $wallet_name, $wallet_ref, $wallet_desc, $wallet_status_id ) {

    // Init the Wallet Entity
    $wallet = new Wallet();

    // Assign parameter to column value
    $wallet->wallet_name        = $wallet_name;
    $wallet->wallet_ref         = $wallet_ref;
    $wallet->wallet_desc        = $wallet_desc;
    $wallet->wallet_status_id   = $wallet_status_id;

    // Add new row for Wallet
    $wallet->save();

    return $wallet;
  }

  /**
   * Get Wallet Advance List
   * @param keyword keyword of searching
   * @param status filter status
   * @param limit maximal row
   * @param offset offset
   * @return wallet_advance_list advance list of wallet
   */
  public function getWalletAdvanceList ( $keyword, $status, $limit, $offset ) {

    $keyword_params = trim(strtoupper($keyword)); 
    $status_params  = $status;
    $limit_params   = $limit;
    $offset_params  = ($offset - 1) * $limit;

    $queryBuilder = new QueryBuilder();
    $queryBuilder
        ->add(" SELECT ")
        ->add(" A.wallet_id, ")
        ->add(" A.wallet_name, ")
        ->add(" A.wallet_ref, ")
        ->add(" A.wallet_desc, ")
        ->add(" B.wallet_status_name, ")
        ->add(" FROM m_wallet A ")
        ->add(" JOIN m_wallet_status B ON A.wallet_status_id = B.wallet_status_id ")
        ->add(" WHERE wallet_id != 0 ")
        ->addIfNotEmpty($keyword_params, " AND (A.wallet_name ILIKE '%".$keyword_params."%' OR A.wallet_ref ILIKE '%".$keyword_params."%' OR A.wallet_description ILIKE '%".$keyword_params."%' )")
        ->addIfNotEmpty($status_params, " AND B.wallet_status_name = '".$status_params."' ")
        ->add(" ORDER BY A.wallet_name ")
        ->add(" LIMIT :limit OFFSET :offset ");
        
    //Log::debug($queryBuilder->toString());
    $query = new CreateNativeQuery($queryBuilder->toString());
    $query->setParameter("limit", $limit_params);
    $query->setParameter("offset", $offset_params);
    
    $result = $query->getResultList();

    return [
        "wallet_advance_list" => $result
    ];
  }

  /**
   * Find Wallet By Id
   * @param wallet_id wallet id
   * @return wallet data
   */
  public function findWalletById ( $wallet_id ){

    // Find Wallet By Id
    $wallet = Wallet::where('wallet_id', $wallet_id)->first();

    return $wallet;
  }

  /**
   * Edit Wallet
   * @param wallet_id wallet id
   * @param wallet_name wallet name 
   * @param wallet_ref reference of the wallet
   * @param wallet_desc description of the wallet
   * @param wallet_status_id wallet status from table wallet_status
   * @return wallet edited
   */
  public function editWallet ( $wallet_id, $wallet_name, $wallet_ref, $wallet_desc, $wallet_status_id ){

    // Init the Wallet Entity by its primary key
    $wallet = Wallet::findOrFail($wallet_id);

    // Assign parameter to column value
    $wallet->wallet_name        = $wallet_name;
    $wallet->wallet_ref         = $wallet_ref;
    $wallet->wallet_desc        = $wallet_desc;
    $wallet->wallet_status_id   = $wallet_status_id;

    // Edit wallet data
    $wallet->save();

    return $wallet;
  }

  /**
   * Get Wallet Status List
   * @return wallet_status_list list of wallet status
   */
  public function getWalletStatusList (){

    // Get all Wallet Status list
    $wallet_status = WalletStatus::all();

    return [
        "wallet_status_list" => $wallet_status
    ];
  }

  /**
   * Get Wallet List
   * @return wallet_list list of wallet
   */
  public function getWalletList (){

    $queryBuilder = new QueryBuilder();
    $queryBuilder
        ->add(" SELECT ")
        ->add(" A.wallet_id, ")
        ->add(" A.wallet_name, ")
        ->add(" A.wallet_ref, ")
        ->add(" A.wallet_desc, ")
        ->add(" B.wallet_status_name, ")
        ->add(" FROM m_wallet A ")
        ->add(" JOIN m_wallet_status B ON A.wallet_status_id = B.wallet_status_id ")
        ->add(" WHERE wallet_status_name = 'Aktif' ")
        ->add(" ORDER BY A.wallet_name ");
        
    // \Log::debug($queryBuilder->toString());
    $query = new CreateNativeQuery($queryBuilder->toString());
    
    $result = $query->getResultList();

    return [
        "wallet_list" => $result
    ];
  }

  /**
   * Do Active Wallet Status
   * @param wallet_id wallet id
   * @return wallet edited
   */
  public function doActiveWalletStatus ( $wallet_id ){

    $wallet_status = WalletStatus::where('wallet_status_name', 'Aktif')->first();
    $wallet_status_id = $wallet_status->wallet_status_id;

    // Init the Wallet Entity by its primary key
    $wallet = Wallet::findOrFail($wallet_id);

    // Assign wallet status
    $wallet->wallet_status_id   = $wallet_status_id;

    // Update wallet data
    $wallet->save();

    return $wallet;
  }

  /**
   * Do Not Active Wallet Status
   * @param wallet_id wallet id
   * @return wallet edited
   */
  public function doNotActiveWalletStatus ( $wallet_id ){

    $wallet_status = WalletStatus::where('wallet_status_name', 'Tidak Aktif')->first();
    $wallet_status_id = $wallet_status->wallet_status_id;

    // Init the Wallet Entity by its primary key
    $wallet = Wallet::findOrFail($wallet_id);

    // Assign wallet status
    $wallet->wallet_status_id   = $wallet_status_id;

    // Update wallet data
    $wallet->save();

    return $wallet;
  }
}