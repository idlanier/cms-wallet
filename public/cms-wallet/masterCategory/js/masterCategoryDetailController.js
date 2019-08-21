(function() {

    'use strict';
    
    angular.module('categoryModule')
      .controller('MasterCategoryDetailController', MasterCategoryDetailController);
  
      MasterCategoryDetailController.$inject = ['MasterCategoryService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function MasterCategoryDetailController(MasterCategoryService, $state, $uibModal, $scope, $stateParams) {

          var ctrl = $scope;

  
      };
  
  })()
  