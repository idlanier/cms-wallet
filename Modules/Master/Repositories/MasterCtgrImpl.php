<?php
namespace Modules\Master\Repository;

use Modules\Common\Helpers\QueryBuilder;
use Modules\Common\Helpers\CreateNativeQuery;
use Modules\Master\Entities\Ctgr;
use Modules\Master\Entities\CtgrStatus;

/**
 * Repository for Master Ctgr
 */
class MasterCtgrImpl implements MasterCtgr {

  /**
   * Add Ctgr
   * @param ctgr_name category name 
   * @param ctgr_desc category description
   * @param ctgr_status_id category status from table category status
   * @return ctgr inserted
   */
  public function addCtgr ( $ctgr_name, $ctgr_desc, $ctgr_status_id ) {

    // Init the Ctgr Entity
    $ctgr = new Ctgr();

    // Assign parameter to column value
    $ctgr->ctgr_name        = $ctgr_name;
    $ctgr->ctgr_desc        = $ctgr_desc;
    $ctgr->ctgr_status_id   = $ctgr_status_id;

    // Add new row for Ctgr
    $ctgr->save();

    return $ctgr;
  }

  /**
   * Get Category Advance List
   * @param keyword keyword of searching
   * @param status filter status
   * @param limit maximal row
   * @param offset offset
   * @return ctgr_list list of ctgr
   */
  public function getCtgrAdvanceList ( $keyword, $status, $limit, $offset ) {

    $keyword_params = trim(strtoupper($keyword)); 
    $status_params  = $status;
    $limit_params   = $limit;
    $offset_params  = ($offset - 1) * $limit;

    $queryBuilder = new QueryBuilder();
    $queryBuilder
        ->add(" SELECT ")
        ->add(" A.ctgr_id, ")
        ->add(" A.ctgr_name, ")
        ->add(" A.ctgr_desc, ")
        ->add(" B.ctgr_status_name, ")
        ->add(" FROM m_ctgr A ")
        ->add(" JOIN m_ctgr_status B ON A.ctgr_status_id = B.ctgr_status_id ")
        ->add(" WHERE ctgr_id != 0 ")
        ->addIfNotEmpty($keyword_params, " AND (A.ctgr_name ILIKE '%".$keyword_params."%' OR A.ctgr_desc ILIKE '%".$keyword_params."%' )")
        ->addIfNotEmpty($status_params, " AND B.ctgr_status_name = '".$status_params."' ")
        ->add(" ORDER BY A.ctgr_name ")
        ->add(" LIMIT :limit OFFSET :offset ");
        
    // \Log::debug($queryBuilder->toString());
    $query = new CreateNativeQuery($queryBuilder->toString());
    $query->setParameter("limit", $limit_params);
    $query->setParameter("offset", $offset_params);
    
    $result = $query->getResultList();

    return [
        "ctgr_advance_list" => $result
    ];
  }

  /**
   * Find Ctgr By Id
   * @param ctgr_id category id
   * @return ctgr data
   */
  public function findCtgrById ( $ctgr_id ){

    // Find Ctgr By Id
    $ctgr = Ctgr::where('wallet_id', $ctgr_id)->first();

    return $ctgr;
  }

  /**
   * Edit Ctgr
   * @param ctgr_id category id 
   * @param ctgr_name category name 
   * @param ctgr_desc category description
   * @param ctgr_status_id category status from table category status
   * @return ctgr edited
   */
  public function editCtgr ( $ctgr_id, $ctgr_name, $ctgr_desc, $ctgr_status_id ){

    // Init the Category Entity by its primary key
    $ctgr = Ctgr::findOrFail($ctgr_id);

    // Assign parameter to column value
    $ctgr->ctgr_name        = $ctgr_name;
    $ctgr->ctgr_desc        = $ctgr_desc;
    $ctgr->ctgr_status_id   = $ctgr_status_id;

    // Edit Category data
    $ctgr->save();

    return $ctgr;
  }

  /**
   * Get Ctgr Status List
   * @return ctgr_status_list list of ctgr status
   */
  public function getCtgrStatusList (){

    // Get all Category Status list
    $ctgr_status = CtgrStatus::all();

    return [
        "ctgr_status_list" => $ctgr_status
    ];
  }

  /**
   * Get Category List
   * @return ctgr_list list of ctgr
   */
  public function getCtgrList () {

    $queryBuilder = new QueryBuilder();
    $queryBuilder
        ->add(" SELECT ")
        ->add(" A.ctgr_id, ")
        ->add(" A.ctgr_name, ")
        ->add(" A.ctgr_desc, ")
        ->add(" B.ctgr_status_name, ")
        ->add(" FROM m_ctgr A ")
        ->add(" JOIN m_ctgr_status B ON A.ctgr_status_id = B.ctgr_status_id ")
        ->add(" WHERE ctgr_status_name = 'Aktif' ")
        ->add(" ORDER BY A.ctgr_name ");
        
    // \Log::debug($queryBuilder->toString());
    $query = new CreateNativeQuery($queryBuilder->toString());
    
    $result = $query->getResultList();

    return [
        "ctgr_list" => $result
    ];
  }

  /**
   * Do Active Ctgr Status
   * @param ctgr_id ctgr id
   * @return ctgr edited
   */
  public function doActiveCtgrStatus ( $ctgr_id ){

    $ctgr_status = CtgrStatus::where('ctgr_status_name', 'Aktif')->first();
    $ctgr_status_id = $ctgr_status->ctgr_status_id;

    // Init the Category Entity by its primary key
    $ctgr = Ctgr::findOrFail($ctgr_id);

    // Assign Category status
    $ctgr->ctgr_status_id   = $ctgr_status_id;

    // Update Category data
    $ctgr->save();

    return $ctgr;
  }

  /**
   * Do Not Active Ctgr Status
   * @param ctgr_id ctgr id
   * @return ctgr edited
   */
  public function doNotActiveCtgrStatus ( $ctgr_id ){

    $ctgr_status = CtgrStatus::where('ctgr_status_name', 'Tidak Aktif')->first();
    $ctgr_status_id = $ctgr_status->ctgr_status_id;

    // Init the Category Entity by its primary key
    $ctgr = Ctgr::findOrFail($ctgr_id);

    // Assign Category status
    $ctgr->ctgr_status_id   = $ctgr_status_id;

    // Update Category data
    $ctgr->save();

    return $ctgr;
  }
}