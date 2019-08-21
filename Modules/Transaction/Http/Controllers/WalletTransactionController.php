<?php

namespace Modules\Transaction\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Transaction\Repository\WalletTransaction;

class WalletTransactionController extends Controller
{
    /**
     * 
     * @var Modules\Transaction\Repository\WalletTransaction;
     */
    protected $walletTransactionRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WalletTransaction $walletTransaction)
    {
        $this->middleware('auth');

        $this->walletTransactionRepository = $walletTransaction;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('transaction::walletTransaction.index');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function viewWalletTransactionAddIn()
    {
        return view('transaction::walletTransaction.viewWalletTransactionAddIn');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function viewWalletTransactionAddOut()
    {
        return view('transaction::walletTransaction.viewWalletTransactionAddOut');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function viewAddWalletTransactionIn()
    {
        return view('transaction::walletTransaction.addTransactionWalletIn');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function viewAddWalletTransactionOut()
    {
        return view('transaction::walletTransaction.addTransactionWalletOut');
    }

    /**
     * Add Transcation Wallet In
     * @param Request $request->trx_wallet_desc
     * @param Request $request->trx_wallet_amount
     * @param Request $request->wallet_id
     * @param Request $request->ctgr_id
     * @return Response JSON
     */
    public function addTrxWalletIn(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'trx_wallet_amount'     => 'required|min:1',
            'trx_wallet_desc'       => 'max:100',
            'wallet_id'             => 'required',
            'ctgr_id'               => 'required'
        ]);

        // Validate required field
        if ($validator->fails()) {
            return response()->json([
                'status' => 'FAIL',
                'status_code' => 101,
                'error_list' => $validator->errors()
            ]);
        }

        $trx_wallet_desc        = $request->trx_wallet_desc;
        $trx_wallet_date        = date("Ymd", time());
        $trx_wallet_amount      = $request->trx_wallet_amount;
        $wallet_id              = $request->wallet_id;
        $ctgr_id                = $request->ctgr_id;

        // Add Transaction Wallet In
        $addTrxWalletIn = $this->masterWalletRepository->addTrxWalletIn( $trx_wallet_desc, $trx_wallet_date, $trx_wallet_amount, $wallet_id, $ctgr_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $addTrxWalletIn
        ]);
    }

    /**
     * Add Transcation Wallet Out
     * @param Request $request->trx_wallet_desc
     * @param Request $request->trx_wallet_amount
     * @param Request $request->wallet_id
     * @param Request $request->ctgr_id
     * @return Response JSON
     */
    public function addTrxWalletOut(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'trx_wallet_amount'     => 'required|min:1',
            'trx_wallet_desc'       => 'max:100',
            'wallet_id'             => 'required',
            'ctgr_id'               => 'required'
        ]);

        // Validate required field
        if ($validator->fails()) {
            return response()->json([
                'status' => 'FAIL',
                'status_code' => 101,
                'error_list' => $validator->errors()
            ]);
        }

        $trx_wallet_desc        = $request->trx_wallet_desc;
        $trx_wallet_date        = date("Ymd", time());
        $trx_wallet_amount      = $request->trx_wallet_amount;
        $wallet_id              = $request->wallet_id;
        $ctgr_id                = $request->ctgr_id;

        // Add Transaction Wallet Out
        $addTrxWalletOut = $this->masterWalletRepository->addTrxWalletOut( $trx_wallet_desc, $trx_wallet_date, $trx_wallet_amount, $wallet_id, $ctgr_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $addTrxWalletOut
        ]);
    }

    /**
     * Get Transaction List
     * @param Request $request->keyword
     * @param Request $request->limit
     * @param Request $request->offset
     * @return Response JSON
     */
    public function getTrxList(Request $request)
    {

        $keyword    = $request->keyword;
        $limit      = $request->limit;
        $offset     = $request->offset;

        // Get Transaction List
        $getTrxList = $this->masterWalletRepository->getTrxList( $keyword, $limit, $offset );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'trx_list' => $getTrxList["trx_list"]
        ]);

    }

    /**
     * Find Transaction Wallet By Id
     * @param Request $request->trx_wallet_id
     * @return Response
     */
    public function findTrxWalletById(Request $request)
    {
        
        $trx_wallet_id    = $request->trx_wallet_id;

        // Find Transcation Wallet By Id
        $findTrxWalletById = $this->masterWalletRepository->findTrxWalletById( $trx_wallet_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $findTrxWalletById
        ]);
    }

}
