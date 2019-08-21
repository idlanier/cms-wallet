(function(){
    'use strict';
    angular
        .module('transactionModule')
        .service('WalletTransactionService', ['$http', http]);
    
    function http($http){
        return {
            addTrxWalletIn : function(input){
                var request = $http({
                    method: "POST",
                    url: "/transaction/addTrxWalletIn",
                    data: input
                });
                return (request);
            },
            addTrxWalletOut : function(input){
                var request = $http({
                    method: "POST",
                    url: "/transaction/addTrxWalletOut",
                    data: input
                });
                return (request);
            },
            getTrxList : function(input){
                var request = $http({
                    method: "GET",
                    url: "/transaction/getTrxList",
                    params: input
                });
                return (request);
            },
            findTrxWalletById : function(input){
                var request = $http({
                    method: "GET",
                    url: "/transaction/findTrxWalletById",
                    params: input
                });
                return (request);
            }
        }
    }
})();