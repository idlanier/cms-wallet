(function() {

    'use strict';
    
    angular.module('walletModule')
      .controller('MasterWalletAddController', MasterWalletAddController);
  
      MasterWalletAddController.$inject = ['MasterWalletService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function MasterWalletAddController(MasterWalletService, $state, $uibModal, $scope, $stateParams) {

          var ctrl = $scope;

  
      };
  
  })()
  