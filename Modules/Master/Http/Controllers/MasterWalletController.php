<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Repository\MasterWallet;

class MasterWalletController extends Controller
{
    /**
     * 
     * @var App\Repository\MasterWallet;
     */
    protected $masterWalletRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MasterWallet $masterWallet)
    {
        $this->middleware('auth');

        $this->masterWalletRepository = $masterWallet;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('master::index');
    }

    /**
     * Add Wallet
     * @param Request $request->wallet_name
     * @param Request $request->wallet_ref
     * @param Request $request->wallet_desc
     * @param Request $request->wallet_status_id
     * @return Response JSON
     */
    public function addWallet(Request $request)
    {

        $validator = Validator::make($request->all(), [
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

        $wallet_name        = $request->wallet_name;
        $wallet_ref         = $request->wallet_ref;
        $wallet_desc        = $request->wallet_desc;
        $wallet_status_id   = $request->wallet_status_id;

        // Add Wallet
        $addWallet = $this->masterWalletRepository->addWallet( $wallet_name, $wallet_ref, $wallet_desc, $wallet_status_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $addWallet
        ]);
    }

    /**
     * Get Wallet Advance List
     * @param Request $request->keyword
     * @param Request $request->status
     * @param Request $request->limit
     * @param Request $request->offset
     * @return Response JSON
     */
    public function getWalletAdvanceList(Request $request)
    {

        $keyword    = $request->keyword;
        $status     = $request->status;
        $limit      = $request->limit;
        $offset     = $request->offset;

        // Get Wallet Advance List
        $getWalletAdvanceList = $this->masterWalletRepository->getWalletAdvanceList( $keyword, $status, $limit, $offset );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'wallet_advance_list' => $getWalletAdvanceList["wallet_advance_list"]
        ]);

    }

    /**
     * Find Wallet By Id
     * @param Request $request->wallet_id
     * @return Response
     */
    public function findWalletById(Request $request)
    {
        
        $wallet_id    = $request->wallet_id;

        // Find Wallet By Id
        $findWalletById = $this->masterWalletRepository->findWalletById( $wallet_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $findWalletById
        ]);
    }

    /**
     * Edit Wallet
     * @param Request $request->wallet_id
     * @param Request $request->wallet_name
     * @param Request $request->wallet_ref
     * @param Request $request->wallet_desc
     * @param Request $request->wallet_status_id
     * @return Response JSON
     */
    public function editWallet(Request $request)
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

        $wallet_id          = $request->wallet_id;
        $wallet_name        = $request->wallet_name;
        $wallet_ref         = $request->wallet_ref;
        $wallet_desc        = $request->wallet_desc;
        $wallet_status_id   = $request->wallet_status_id;

        // Edit Wallet
        $editWallet = $this->masterWalletRepository->editWallet( $wallet_id, $wallet_name, $wallet_ref, $wallet_desc, $wallet_status_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $editWallet
        ]);
    }

    /**
     * Get Wallet Status List
     * @return Response JSON
     */
    public function getWalletStatusList()
    {
        
        // Get Wallet Status List
        $getWalletStatusList = $this->masterWalletRepository->getWalletStatusList();

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'wallet_status_list' => $getWalletStatusList["wallet_status_list"]
        ]);
    }

    /**
     * Get Wallet List
     * @return Response
     */
    public function getWalletList()
    {

        // Get Wallet List
        $getWalletList = $this->masterWalletRepository->getWalletList();

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'wallet_list' => $getWalletList["wallet_list"]
        ]);
    }

    /**
     * Do Active Wallet Status
     * @param Request $request->wallet_id
     * @return Response
     */
    public function doActiveWalletStatus(Request $request)
    {
        $wallet_id  = $request->wallet_id;

        // Do Active Wallet Status
        $doActiveWalletStatus = $this->masterWalletRepository->doActiveWalletStatus( $wallet_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $doActiveWalletStatus
        ]);
    }

    /**
     * Do Not Active Wallet Status
     * @param Request $request->wallet_id
     * @return Response
     */
    public function doNotActiveWalletStatus(Request $request)
    {
        $wallet_id  = $request->wallet_id;

        // Do Active Wallet Status
        $doNotActiveWalletStatus = $this->masterWalletRepository->doNotActiveWalletStatus( $wallet_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $doNotActiveWalletStatus
        ]);
    }

}
