(function() {

    'use strict';
    angular.module('transactionModule', ['ui.router', 'ui.bootstrap'])
        .config(function($stateProvider, $urlRouterProvider, $interpolateProvider){
            
            $interpolateProvider.startSymbol('[[');
		    $interpolateProvider.endSymbol(']]');

            $stateProvider
                .state('viewWalletTransactionIn', {
                    url:'/viewWalletTransactionIn',
                    templateUrl: '/transaction/viewWalletTransactionIn',
                    controller: 'WalletTransactionInController as walletTransactionInController'
                })
                .state('viewWalletTransactionOut', {
                    url:'/viewWalletTransactionOut',
                    templateUrl: '/transaction/viewWalletTransactionOut',
                    controller: 'WalletTransactionOutController as walletTransactionOutController'
                })
                .state('addWalletTransactionOut', {
                    url: '/addWalletTransactionOut',
                    templateUrl: '/transaction/addTransactionWalletOutView',
                    controller: 'WalletTransactionAddOutController as walletTransactionAddOutController'
                })
                .state('addWalletTransactionIn', {
                    url: '/addWalletTransactionIn',
                    templateUrl: '/transaction/addTransactionWalletInView',
                    controller: 'WalletTransactionAddInController as walletTransactionAddInController'
                })

            $urlRouterProvider.otherwise('/viewWalletTransactionIn');

        });

})();