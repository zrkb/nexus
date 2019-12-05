@extends('nexus::layouts/app')

@section('content')

	<div class="row justify-content-center">
		<div class="col-12 col-lg-10 col-xl-8">

			@component('nexus::misc/page-title')
				@slot('superactions')
					@include('nexus::components/back-to-resource')
				@endslot

				Crear {{ $resource->singularLabel() }}
			@endcomponent

			@messages

			{{ form()->open(['url' => resource('store'), 'method' => 'post']) }}
			
				@include('nexus::resources/form', [
					'fields' => $resource->creationFields(),
				])

				<hr>

				@include('nexus::misc/form-buttons')

			{{ form()->close() }}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endsection
