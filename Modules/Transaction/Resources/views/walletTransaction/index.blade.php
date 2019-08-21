@extends('common::layouts.master')
@section('page-title')
    Wallet Transaction
@endsection
@section('script')
    <script src="{{ URL::asset('/cms-wallet/walletTransaction/js/walletTransactionModule.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/walletTransaction/js/walletTransactionService.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/walletTransaction/js/walletTransactionAddInController.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/walletTransaction/js/walletTransactionAddOutController.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/walletTransaction/js/walletTransactionInController.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/walletTransaction/js/walletTransactionOutController.js')}}"></script>
@endsection
@section('content')
    <div id="content" ng-app="transactionModule">
        <div ui-view></div>
    </div>
@endsection