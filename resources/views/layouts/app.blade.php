@extends('nexus::layouts/master')

@section('app')
	@include('nexus::layouts/sidebar')
	
	<!-- MAIN CONTENT
    ================================================== -->
    <div class="main-content">
    	@include('nexus::layouts/nav')

		<div class="container-fluid">
            @include('nexus::layouts/errors')
            @include('nexus::layouts/flash')
    
    		@yield('content')
    	</div>
    </div>
@endsection
