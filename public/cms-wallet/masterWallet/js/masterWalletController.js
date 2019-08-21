(function() {

    'use strict';
    
    angular.module('walletModule')
      .controller('MasterWalletController', MasterWalletController);
  
      MasterWalletController.$inject = ['MasterWalletService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function MasterWalletController(MasterWalletService, $state, $uibModal, $scope, $stateParams) {

          var ctrl = $scope;

  
      };
  
  })()
  