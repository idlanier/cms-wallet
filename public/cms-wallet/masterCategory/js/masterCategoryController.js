(function() {

    'use strict';
    
    angular.module('categoryModule')
      .controller('MasterCategoryController', MasterCategoryController);
  
      MasterCategoryController.$inject = ['MasterCategoryService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function MasterCategoryController(MasterCategoryService, $state, $uibModal, $scope, $stateParams) {

          var ctrl = $scope;

  
      };
  
  })()
  