(function() {

    'use strict';
    
    angular.module('categoryModule')
      .controller('MasterCategoryEditController', MasterCategoryEditController);
  
      MasterCategoryEditController.$inject = ['MasterCategoryService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function MasterCategoryEditController(MasterCategoryService, $state, $uibModal, $scope, $stateParams) {

          var ctrl = $scope;

  
      };
  
  })()
  