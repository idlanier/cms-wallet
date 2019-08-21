(function() {

    'use strict';
    
    angular.module('transactionModule')
      .controller('WalletTransactionInController', WalletTransactionInController);
  
      WalletTransactionInController.$inject = ['WalletTransactionService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function WalletTransactionInController(WalletTransactionService, $state, $uibModal, $scope, $stateParams) {

          var ctrl = $scope;

  
      };
  
  })()
  