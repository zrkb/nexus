@extends('nexus::layouts/app')

@section('content')
	
	@include('nexus::misc/scripts/datatables')
	@yield('content')

@endsection
