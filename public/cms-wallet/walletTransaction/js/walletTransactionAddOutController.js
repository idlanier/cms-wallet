(function() {

    'use strict';
    
    angular.module('transactionModule')
      .controller('WalletTransactionAddOutController', WalletTransactionAddOutController);
  
      WalletTransactionAddOutController.$inject = ['WalletTransactionService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function WalletTransactionAddOutController(WalletTransactionService, $state, $uibModal, $scope, $stateParams) {

          var ctrl = $scope;

  
      };
  
  })()
  