(function() {

    'use strict';
    
    angular.module('categoryModule')
      .controller('MasterCategoryAddController', MasterCategoryAddController);
  
      MasterCategoryAddController.$inject = ['MasterCategoryService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function MasterCategoryAddController(MasterCategoryService, $state, $uibModal, $scope, $stateParams) {

          var ctrl = $scope;

  
      };
  
  })()
  