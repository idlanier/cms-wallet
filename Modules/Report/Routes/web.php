<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('report')->group(function() {
    Route::get('/', 'ReportController@index');

    // Route for View Wallet Transaction Report 
    Route::get('/report', 'WalletTransactionReportController@index');
    Route::get('/viewWalletTransactionReport', 'WalletTransactionReportController@viewWalletTransactionReport');

    // Route for Wallet Transaction Report Repo
    Route::get('/getWalletTransactionReport', 'WalletTransactionReportController@getWalletTransactionReport');

});
