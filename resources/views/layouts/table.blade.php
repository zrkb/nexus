@extends('laramie::layouts/app')

@section('content')
	
	@include('laramie::misc/scripts/datatables')
	@yield('content')

@endsection
