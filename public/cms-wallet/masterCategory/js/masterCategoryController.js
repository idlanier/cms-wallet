(function() {

    'use strict';
    
    angular.module('categoryModule')
      .controller('MasterCategoryController', MasterCategoryController);
  
      MasterCategoryController.$inject = ['MasterCategoryService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function MasterCategoryController(MasterCategoryService, $state, $uibModal, $scope, $stateParams) {

        var ctrl = $scope;

        $scope.goToAddCategory = function(){
            $state.go('addCategory');
        }

        $scope.goToDetailCategory = function(){
            $state.go('detailCategory', {id: 1});
        }

        $scope.goToEditCategory = function(){
            $state.go('editCategory', {id: 1});
        }
  
      };
  
  })()
  