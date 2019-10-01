@extends('laramie::layouts/master')

@section('app')
	@include('laramie::layouts/sidebar')
	
	<!-- MAIN CONTENT
    ================================================== -->
    <div class="main-content">
    	@include('laramie::layouts/nav')

		<div class="container-fluid">
    		@yield('content')
    	</div>
    </div>
@endsection
