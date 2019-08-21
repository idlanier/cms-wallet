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

Route::prefix('master')->group(function() {
    Route::get('/', 'MasterController@index');

    // Route View Master Wallet
    Route::get('/wallet', 'MasterWalletController@index');
    Route::get('/viewWalletList', 'MasterWalletController@viewWalletList');
    Route::get('/viewAddWallet', 'MasterWalletController@viewAddWallet');
    Route::get('/viewEditWallet', 'MasterWalletController@viewEditWallet');
    Route::get('/viewDetailWallet', 'MasterWalletController@viewDetailWallet');

    // Route Repository Master Wallet
    Route::post('/addWallet', 'MasterWalletController@addWallet');
    Route::get('/getWalletAdvanceList', 'MasterWalletController@getWalletAdvanceList');
    Route::get('/findWalletById', 'MasterWalletController@findWalletById');
    Route::post('/editWallet', 'MasterWalletController@editWallet');
    Route::get('/getWalletStatusList', 'MasterWalletController@getWalletStatusList');
    Route::get('/getWalletList', 'MasterWalletController@getWalletList');
    Route::post('/doActiveWalletStatus', 'MasterWalletController@doActiveWalletStatus');
    Route::post('/doNotActiveWalletStatus', 'MasterWalletController@doNotActiveWalletStatus');

    // Route View Master Category
    Route::get('/ctgr', 'MasterCategoryController@index');
    Route::get('/viewCtgrList', 'MasterCategoryController@viewCtgrList');
    Route::get('/viewAddCtgr', 'MasterCategoryController@viewAddCtgr');
    Route::get('/viewEditCtgr', 'MasterCategoryController@viewEditCtgr');
    Route::get('/viewDetailCtgr', 'MasterCategoryController@viewDetailCtgr');

    // Route Master Category
    Route::post('/addCtgr', 'MasterCategoryController@addCtgr');
    Route::get('/getCtgrAdvanceList', 'MasterCategoryController@getCtgrAdvanceList');
    Route::get('/findCtgrById', 'MasterCategoryController@findCtgrById');
    Route::post('/editCtgr', 'MasterCategoryController@editCtgr');
    Route::get('/getCtgrStatusList', 'MasterCategoryController@getCtgrStatusList');
    Route::get('/getCtgrList', 'MasterCategoryController@getCtgrList');
    Route::post('/doActiveCtgrStatus', 'MasterCategoryController@doActiveCtgrStatus');
    Route::post('/doNotActiveCtgrStatus', 'MasterCategoryController@doNotActiveCtgrStatus');

});
