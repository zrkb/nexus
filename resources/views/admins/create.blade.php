@extends('nexus::layouts/app')

@section('content')

	<div class="row justify-content-center">
		<div class="col-12 col-lg-10 col-xl-8">
			@component('nexus::misc/page-title')
				@slot('superactions')
					@include('nexus::components/back-to-resource')
				@endslot

				Crear Usuario
			@endcomponent

			@messages

			{{ form()->open(['route' => 'admins.store']) }}
			
				<div class="card">
					<div class="card-body">
						@include('nexus::admins/form')
					</div>
				</div>

				<hr>

				<div class="form-group">
					<a href="{{ resource('index') }}" class="btn btn-white mr-2">
						@lang('nexus::resource.cancel-form-button')
					</a>

					<button type="submit" class="btn btn-primary btn-activity">
						@lang('nexus::resource.submit-form-button')
					</button>
				</div>

			{{ form()->close() }}
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endsection
