(function() {

    'use strict';
    angular.module('transactionModule', ['ui.router', 'ui.bootstrap'])
        .config(function($stateProvider, $urlRouterProvider, $interpolateProvider){
            
            $interpolateProvider.startSymbol('[[');
		    $interpolateProvider.endSymbol(']]');

            $stateProvider
                .state('viewAddWalletTransactionIn', {
                    url:'/viewAddWalletTransactionIn',
                    templateUrl: '/transaction/viewAddWalletTransactionIn',
                    controller: 'WalletTransactionAddInController as walletTransactionAddInController'
                })
                .state('viewAddWalletTransactionOut', {
                    url:'/viewAddWalletTransactionOut',
                    templateUrl: '/transaction/viewAddWalletTransactionOut',
                    controller: 'WalletTransactionAddOutController as walletTransactionAddOutController'
                })
                .state('addWalletTransactionOut', {
                    url: '/addWalletTransactionOut',
                    templateUrl: '/transaction/viewWalletAddTransactionOut',
                    controller: 'WalletTransactionOutController as walletTransactionOutController'
                })
                .state('addWalletTransactionIn', {
                    url: '/addWalletTransactionIn',
                    templateUrl: '/transaction/viewWalletAddTransactionIn',
                    controller: 'WalletTransactionInController as walletTransactionInController'
                })

            $urlRouterProvider.otherwise('/viewAddWalletTransactionIn');

        });

})();