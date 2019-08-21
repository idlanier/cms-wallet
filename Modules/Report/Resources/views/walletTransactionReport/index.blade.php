@extends('common::layouts.master')
@section('page-title')
    Wallet Transaction Report
@endsection
@section('script')
    <script src="{{ URL::asset('/cms-wallet/walletTransactionReport/js/walletTransactionReportModule.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/walletTransactionReport/js/walletTransactionReportService.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/walletTransactionReport/js/walletTransactionReportController.js')}}"></script>
@endsection
@section('content')
    <div id="content" ng-app="reportTransactionModule">
        <div ui-view></div>
    </div>
@endsection