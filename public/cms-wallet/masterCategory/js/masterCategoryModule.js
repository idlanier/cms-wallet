(function() {

    'use strict';
    
    angular.module('categoryModule', ['ui.router', 'ui.bootstrap'])
        .config(function($stateProvider, $urlRouterProvider, $interpolateProvider){
            
            $interpolateProvider.startSymbol('[[');
		    $interpolateProvider.endSymbol(']]');

            $stateProvider
                .state('viewCategoryList', {
                    url:'/viewCategoryList',
                    templateUrl: '/master/viewCategoryList',
                    controller: 'MasterCategoryController as masterCategoryController'
                })
                .state('editCategory', {
                    url: '/editCategory/:id',
                    templateUrl: '/master/viewEditCategory',
                    controller: 'MasterCategoryEditController as masterCategoryEditController'
                })
                .state('addCategory', {
                    url: '/addCategory',
                    templateUrl: '/master/viewAddCategory',
                    controller: 'MasterCategoryAddController as masterCategoryAddController'
                })
                .state('detailCategory', {
                    url: '/detailCategory/:id',
                    templateUrl: '/master/viewDetailCategory',
                    controller: 'MasterCategoryDetailController as masterCategoryDetailController'
                })

            $urlRouterProvider.otherwise('/viewCategoryList');

        });

})();