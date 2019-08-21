(function(){
    'use strict';
    angular
        .module('walletModule')
        .service('MasterWalletService', ['$http', http]);
    
    function http($http){
        return {
            addWallet : function(input){
                var request = $http({
                    method: "POST",
                    url: "/master/addWallet",
                    data: input
                });
                return (request);
            },
            getWalletAdvanceList : function(input){
                var request = $http({
                    method: "GET",
                    url: "/master/getWalletAdvanceList",
                    params: input
                });
                return (request);
            },
            findWalletById : function(input){
                var request = $http({
                    method: "GET",
                    url: "/master/findWalletById",
                    params: input
                });
                return (request);
            },
            editWallet : function(input){
                var request = $http({
                    method: "POST",
                    url: "/master/editWallet",
                    data: input
                });
                return (request);
            },
            getWalletStatusList : function(input){
                var request = $http({
                    method: "GET",
                    url: "/master/getWalletStatusList",
                    params: input
                });
                return (request);
            },
            getWalletList : function(input){
                var request = $http({
                    method: "GET",
                    url: "/master/getWalletList",
                    params: input
                });
                return (request);
            },
            doActiveWalletStatus : function(input){
                var request = $http({
                    method: "POST",
                    url: "/master/doActiveWalletStatus",
                    data: input
                });
                return (request);
            },
            doNotActiveWalletStatus : function(input){
                var request = $http({
                    method: "POST",
                    url: "/master/doNotActiveWalletStatus",
                    data: input
                });
                return (request);
            },
            
        }
    }
})();