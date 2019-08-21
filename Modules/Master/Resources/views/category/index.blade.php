@extends('common::layouts.master')
@section('title')
    Kelola Category
@endsection
@section('script')
    <script src="{{ URL::asset('/cms-wallet/masterCategory/js/masterCategoryModule.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/masterCategory/js/masterCategoryService.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/masterCategory/js/masterCategoryController.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/masterCategory/js/masterCategoryAddController.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/masterCategory/js/masterCategoryEditController.js')}}"></script>
    <script src="{{ URL::asset('/cms-wallet/masterCategory/js/masterCategoryDetailController.js')}}"></script>
@endsection
@section('content')
    <ui-view></ui-view>
@endsection
