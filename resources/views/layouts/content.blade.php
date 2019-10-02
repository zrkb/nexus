@extends('nexus::layouts/app')

@section('content')

	<div class="root">
		@component('nexus::misc/page-title')
			@include('nexus::misc/models/segments')

			{{ $title }}
		@endcomponent

		<div class="card">
			{{ $slot }}
		</div>
		<!-- END card -->
	</div>
	{{-- END root --}}

@endsection
