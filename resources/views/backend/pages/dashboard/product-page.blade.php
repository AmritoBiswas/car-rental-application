@extends('backend/layout.sidenav-layout')
@section('content')
    @include('backend/components.product.product-list')
    @include('backend/components.product.product-delete')
    @include('backend/components.product.product-create')
    @include('backend/components.product.product-update')
@endsection
