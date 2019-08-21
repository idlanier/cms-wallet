(function() {

    'use strict';
    
    angular.module('walletModule')
      .controller('MasterWalletEditController', MasterWalletEditController);
  
      MasterWalletEditController.$inject = ['MasterWalletService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function MasterWalletEditController(MasterWalletService, $state, $uibModal, $scope, $stateParams) {

          var ctrl = $scope;

  
      };
  
  })()
  