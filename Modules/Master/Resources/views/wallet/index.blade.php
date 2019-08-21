@extends('common::layouts.master')
@section('page-title')
    Master Wallet
@endsection
@section('script')
    <script src="{{ URL::asset('/cms-wallet/masterWallet/js/masterWalletModule.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/masterWallet/js/masterWalletService.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/masterWallet/js/masterWalletController.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/masterWallet/js/masterWalletAddController.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/masterWallet/js/masterWalletEditController.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/masterWallet/js/masterWalletDetailController.js')}}"></script>
@endsection
@section('content')
    <div id="content" ng-app="walletModule">
        <div ui-view></div>
    </div>
@endsection
