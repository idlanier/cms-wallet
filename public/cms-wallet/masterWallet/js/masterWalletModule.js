(function() {

    'use strict';
    angular.module('walletModule', ['ui.router', 'ui.bootstrap'])
        .config(function($stateProvider, $urlRouterProvider, $interpolateProvider){
            
            $interpolateProvider.startSymbol('[[');
		    $interpolateProvider.endSymbol(']]');

            $stateProvider
                .state('viewWalletList', {
                    url:'/viewWalletList',
                    templateUrl: '/master/viewWalletList',
                    controller: 'MasterWalletController as masterWalletController'
                })
                .state('editWallet', {
                    url: '/editWallet/:id',
                    templateUrl: '/master/viewEditWallet',
                    controller: 'MasterWalletEditController as masterWalletEditController'
                })
                .state('addWallet', {
                    url: '/addWallet',
                    templateUrl: '/master/viewAddWallet',
                    controller: 'MasterWalletAddController as masterWalletAddController'
                })
                .state('detailWallet', {
                    url: '/detailWallet/:id',
                    templateUrl: '/master/viewDetailWallet',
                    controller: 'MasterWalletDetailController as masterWalletDetailController'
                })

            $urlRouterProvider.otherwise('/viewWalletList');

        });

})();