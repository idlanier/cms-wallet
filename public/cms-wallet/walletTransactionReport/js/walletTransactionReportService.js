(function(){
    'use strict';
    angular
        .module('reportTransactionModule')
        .service('ReportTransactionService', ['$http', http]);
    
    function http($http){
        return {
            getWalletTransactionReport : function(input){
                var request = $http({
                    method: "GET",
                    url: "/report/getWalletTransactionReport",
                    params: input
                });
                return (request);
            }
        }
    }
})();