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

Route::prefix('transaction')->group(function() {
    Route::get('/', 'TransactionController@index');

    // Route Transaction Wallet
    Route::post('/addTrxWalletIn', 'WalletTransactionController@addTrxWalletIn');
    Route::post('/addTrxWalletOut', 'WalletTransactionController@addTrxWalletOut');
    Route::get('/getTrxList', 'WalletTransactionController@getTrxList');
    Route::get('/findTrxWalletById', 'WalletTransactionController@findTrxWalletById');
});
