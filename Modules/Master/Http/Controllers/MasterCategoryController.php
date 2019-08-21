<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Repository\MasterCtgr;

class MasterCategoryController extends Controller
{
    /**
     * 
     * @var App\Repository\MasterCtgr;
     */
    protected $masterCtgrRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MasterCtgr $masterCtgr)
    {
        $this->middleware('auth');

        $this->masterCtgrRepository = $masterCtgr;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('master::category.index');
    }

    /**
     * Add Ctgr
     * @param Request $request->ctgr_name
     * @param Request $request->ctgr_desc
     * @param Request $request->ctgr_status_id
     * @return Response JSON
     */
    public function addCtgr(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ctgr_name'         => 'required|min:5',
            'ctgr_desc'         => 'max:100',
            'ctgr_status_id'    => 'required'
        ]);

        // Validate required field
        if ($validator->fails()) {
            return response()->json([
                'status' => 'FAIL',
                'status_code' => 101,
                'error_list' => $validator->errors()
            ]);
        }

        $ctgr_name        = $request->ctgr_name;
        $ctgr_desc        = $request->ctgr_desc;
        $ctgr_status_id   = $request->ctgr_status_id;

        // Add Ctgr
        $addCtgr = $this->masterCtgrRepository->addCtgr( $ctgr_name, $ctgr_desc, $ctgr_status_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $addCtgr
        ]);
    }

    /**
     * Get Ctgr Advance List
     * @param Request $request->keyword
     * @param Request $request->status
     * @param Request $request->limit
     * @param Request $request->offset
     * @return Response JSON
     */
    public function getCtgrAdvanceList(Request $request)
    {

        $keyword    = $request->keyword;
        $status     = $request->status;
        $limit      = $request->limit;
        $offset     = $request->offset;

        // Get Ctgr Advance List
        $getCtgrAdvanceList = $this->masterCtgrRepository->getCtgrAdvanceList( $keyword, $status, $limit, $offset );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'ctgr_advance_list' => $getCtgrAdvanceList["ctgr_advance_list"]
        ]);

    }

    /**
     * Find Ctgr By Id
     * @param Request $request->ctgr_id
     * @return Response
     */
    public function findCtgrById(Request $request)
    {
        
        $ctgr_id    = $request->ctgr_id;

        // Find Ctgr By Id
        $findCtgrById = $this->masterCtgrRepository->findCtgrById( $ctgr_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $findCtgrById
        ]);
    }

    /**
     * Edit Ctgr
     * @param Request $request->ctgr_id
     * @param Request $request->ctgr_name
     * @param Request $request->ctgr_desc
     * @param Request $request->ctgr_status_id
     * @return Response JSON
     */
    public function editCtgr(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'wallet_id'         => 'required',
            'wallet_name'       => 'required|min:5',
            'wallet_desc'       => 'max:100',
            'wallet_status_id'  => 'required'
        ]);

        // Validate required field
        if ($validator->fails()) {
            return response()->json([
                'status' => 'FAIL',
                'status_code' => 101,
                'error_list' => $validator->errors()
            ]);
        }

        $ctgr_id          = $request->ctgr_id;
        $ctgr_name        = $request->ctgr_name;
        $ctgr_desc        = $request->ctgr_desc;
        $ctgr_status_id   = $request->ctgr_status_id;

        // Edit Ctgr
        $editCtgr = $this->masterCtgrRepository->editCtgr( $ctgr_id, $ctgr_name, $ctgr_desc, $ctgr_status_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $editCtgr
        ]);
    }

    /**
     * Get Ctgr Status List
     * @return Response JSON
     */
    public function getCtgrStatusList()
    {
        
        // Get Ctgr Status List
        $getCtgrStatusList = $this->masterCtgrRepository->getCtgrStatusList();

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'ctgr_status_list' => $getCtgrStatusList["ctgr_status_list"]
        ]);
    }

    /**
     * Get Wallet List
     * @return Response
     */
    public function getWalletList()
    {

        // Get Wallet List
        $getWalletList = $this->masterCtgrRepository->getWalletList();

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'wallet_list' => $getWalletList["wallet_list"]
        ]);
    }

    /**
     * Do Active Ctgr Status
     * @param Request $request->ctgr_id
     * @return Response JSON
     */
    public function doActiveCtgrStatus(Request $request)
    {
        $ctgr_id  = $request->ctgr_id;

        // Do Active Ctgr Status
        $doActiveCtgrStatus = $this->masterCtgrRepository->doActiveCtgrStatus( $ctgr_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $doActiveCtgrStatus
        ]);
    }

    /**
     * Do Not Active Ctgr Status
     * @param Request $request->ctgr_id
     * @return Response JSON
     */
    public function doNotActiveCtgrStatus(Request $request)
    {
        $ctgr_id  = $request->ctgr_id;

        // Do Not Active Ctgr Status
        $doNotActiveCtgrStatus = $this->masterCtgrRepository->doNotActiveCtgrStatus( $ctgr_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $doNotActiveCtgrStatus
        ]);
    }

}
