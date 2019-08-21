(function() {

    'use strict';
    
    angular.module('reportTransactionModule')
      .controller('WalletTransactionReportController', WalletTransactionReportController);
  
      WalletTransactionReportController.$inject = ['ReportTransactionService', '$state', '$uibModal', '$scope', '$stateParams'];
  
      function WalletTransactionReportController(ReportTransactionService, $state, $uibModal, $scope, $stateParams) {

          var ctrl = $scope;

  
      };
  
  })()
  