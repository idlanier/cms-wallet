(function(){
    'use strict';
    angular
        .module('categoryModule')
        .service('MasterCategoryService', ['$http', http]);
    
    function http($http){
        return {
            addCtgr : function(input){
                var request = $http({
                    method: "POST",
                    url: "/master/addCtgr",
                    data: input
                });
                return (request);
            },
            getCtgrAdvanceList : function(input){
                var request = $http({
                    method: "GET",
                    url: "/master/getCtgrAdvanceList",
                    params: input
                });
                return (request);
            },
            findCtgrById : function(input){
                var request = $http({
                    method: "GET",
                    url: "/master/findCtgrById",
                    params: input
                });
                return (request);
            },
            editCtgr : function(input){
                var request = $http({
                    method: "POST",
                    url: "/master/editCtgr",
                    data: input
                });
                return (request);
            },
            getCtgrStatusList : function(input){
                var request = $http({
                    method: "GET",
                    url: "/master/getCtgrStatusList",
                    params: input
                });
                return (request);
            },
            getCtgrList : function(input){
                var request = $http({
                    method: "GET",
                    url: "/master/getCtgrList",
                    params: input
                });
                return (request);
            },
            doActiveCtgrStatus : function(input){
                var request = $http({
                    method: "POST",
                    url: "/master/doActiveCtgrStatus",
                    data: input
                });
                return (request);
            },
            doNotActiveCtgrStatus : function(input){
                var request = $http({
                    method: "POST",
                    url: "/master/doNotActiveCtgrStatus",
                    data: input
                });
                return (request);
            },
            
        }
    }
})();