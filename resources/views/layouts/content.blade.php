@extends('laramie::layouts/app')

@section('content')

	<div class="root">
		@component('laramie::misc/page-title')
			@include('laramie::misc/models/segments')

			{{ $title }}
		@endcomponent

		<div class="card">
			{{ $slot }}
		</div>
		<!-- END card -->
	</div>
	{{-- END root --}}

@endsection
