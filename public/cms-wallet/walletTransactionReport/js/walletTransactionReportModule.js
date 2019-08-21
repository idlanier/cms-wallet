(function() {

    'use strict';
    angular.module('reportTransactionModule', ['ui.router', 'ui.bootstrap'])
        .config(function($stateProvider, $urlRouterProvider, $interpolateProvider){
            
            $interpolateProvider.startSymbol('[[');
		    $interpolateProvider.endSymbol(']]');

            $stateProvider
                .state('viewWalletTransactionReport', {
                    url:'/viewWalletTransactionReport',
                    templateUrl: '/report/viewWalletTransactionReport',
                    controller: 'WalletTransactionReportController as walletTransactionReportController'
                })

            $urlRouterProvider.otherwise('/viewWalletTransactionReport');

        });

})();