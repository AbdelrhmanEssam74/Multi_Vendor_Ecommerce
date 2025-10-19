@extends('seller.layouts.layout')
@section('title', 'manage store ')
@section('description')
    Manage your stores, monitor performance, and handle orders all in one place.
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('seller_asset/css/manage_stores.css') }}">
@endsection
@section('seller_layout')
    <livewire:seller.stores.stores-dashboard/>
@endsection
@section('script')
@endsection
