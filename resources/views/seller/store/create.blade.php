@extends('seller.layouts.layout')
@section('title', 'create store ')
@section('description')
    Create your own store and start selling to millions of customers worldwide. Join our marketplace and grow your business today
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('seller_asset/css/create_store.css') }}">
@endsection
@section('seller_layout')
    <livewire:seller.create-store :all-categories="$AllCategories"/>
@endsection
@section('script')
    <script src="{{ asset('seller_asset/js/create_store.js') }}"></script>
@endsection
