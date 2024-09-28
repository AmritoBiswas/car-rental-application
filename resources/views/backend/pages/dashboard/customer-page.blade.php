@extends('backend/layout.sidenav-layout')
@section('content')
   
    @include('backend/components.customer.customer-update')
    @include('backend/components.customer.customer-delete')
    @include('backend/components.customer.customer-list')
@endsection