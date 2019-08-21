(function() {

    'use strict';
    
    angular.module('transactionModule')
      .controller('WalletTransactionAddInController', WalletTransactionAddInController);
  
      WalletTransactionAddInController.$inject = ['WalletTransactionService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function WalletTransactionAddInController(WalletTransactionService, $state, $uibModal, $scope, $stateParams) {

          var ctrl = $scope;

  
      };
  
  })()
  