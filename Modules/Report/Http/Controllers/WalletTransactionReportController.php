<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Report\Repository\WalletTransactionReport;

class WalletTransactionReportController extends Controller
{
    /**
     * 
     * @var Modules\Report\Repository\WalletTransactionReport;
     */
    protected $walletTransactionReportRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WalletTransactionReport $walletTransactionReport)
    {
        $this->middleware('auth');

        $this->walletTransactionReportRepository = $walletTransactionReport;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('report::walletTransactionReport.index');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function viewWalletTransactionReport()
    {
        return view('report::walletTransactionReport.viewWalletTransactionReport');
    }

    /**
     * Get Wallet Transaction Report
     * @param Request $request->start_date
     * @param Request $request->end_date
     * @param Request $request->transaction_status_list
     * @param Request $request->ctgr_id
     * @param Request $request->wallet_id
     * @return Response JSON
     */
    public function getWalletTransactionReport(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'start_date'                    => 'required|min:8|max:8',
            'end_date'                      => 'required|min:8|max:8',
            'transaction_status_list'       => 'required',
            'ctgr_id'                       => 'required',
            'wallet_id'                     => 'required',
        ]);

        // Validate required field
        if ($validator->fails()) {
            return response()->json([
                'status' => 'FAIL',
                'status_code' => 101,
                'error_list' => $validator->errors()
            ]);
        }

        $start_date                 = $request->start_date;
        $end_date                   = $request->end_date;
        $transaction_status_list    = $request->transaction_status_list;
        $ctgr_id                    = $request->ctgr_id;
        $wallet_id                  = $request->wallet_id;

        // Get Wallet Transaction Report
        $getWalletTransactionReport = $this->walletTransactionReportRepository->getWalletTransactionReport( $start_date, $end_date, $transaction_status_list, $ctgr_id, $wallet_id );

        return response()->json([
            'status' => 'OK',
            'status_code' => 200,
            'data' => $getWalletTransactionReport
        ]);
    }

}
