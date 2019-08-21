(function() {

    'use strict';
    
    angular.module('transactionModule')
      .controller('WalletTransactionOutController', WalletTransactionOutController);
  
      WalletTransactionOutController.$inject = ['WalletTransactionService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function WalletTransactionOutController(WalletTransactionService, $state, $uibModal, $scope, $stateParams) {

        var ctrl = $scope;

        $scope.goToAddTransactionWalletOut = function(){
            $state.go('addWalletTransactionOut');
        }

      };
  
  })()
  