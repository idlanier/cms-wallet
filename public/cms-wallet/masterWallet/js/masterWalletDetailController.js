(function() {

    'use strict';
    
    angular.module('walletModule')
      .controller('MasterWalletDetailController', MasterWalletDetailController);
  
      MasterWalletDetailController.$inject = ['MasterWalletService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function MasterWalletDetailController(MasterWalletService, $state, $uibModal, $scope, $stateParams) {

        var ctrl = $scope;

        $scope.goToWalletList = function(){
            $state.go('viewWalletList');
        }
  
      };
  
  })()
  