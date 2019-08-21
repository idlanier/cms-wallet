(function() {

    'use strict';
    
    angular.module('walletModule')
      .controller('MasterWalletController', MasterWalletController);
  
      MasterWalletController.$inject = ['MasterWalletService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function MasterWalletController(MasterWalletService, $state, $uibModal, $scope, $stateParams) {

        var ctrl = $scope;
        
        $scope.goToAddWallet = function(){
            $state.go('addWallet');
        }

        $scope.goToDetailWallet = function(){
            $state.go('detailWallet', {id: 1});
        }

        $scope.goToEditWallet = function(){
            $state.go('editWallet', {id: 1});
        }
  
      };
  
  })()
  