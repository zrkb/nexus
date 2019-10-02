@extends('nexus::layouts/app')

@section('content')

	@include('nexus::misc/models/restore-panel', ['model' => $item])

	@component('nexus::misc/page-title')
		@slot('superactions')
			<a href="{{ resource('edit', $item->id) }}" class="btn btn-success">
				<i class="bx bx-pencil mr-2"></i>
				Editar
			</a>
			
			@include('nexus::components/back-to-resource')

			@include('nexus::misc/models/prev-next-rows', ['model' => $item])
		@endslot

		<span class="text-primary">#{{ $item->id }}</span>
		<span class="text-muted">&rarr;</span>
		{{ $resource->title() }}
	@endcomponent

    @include('nexus::layouts/errors')
    @include('nexus::layouts/flash')

	<div class="row mb-5 justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3 class="card-title mb-4 pb-4 border-bottom font-weight-normal">
						<i class="bx bx-layer text-primary mr-2"></i>
						Datos del Registro
					</h3>

					<div class="form mt-3">
						@foreach ($resource->detailFields() as $field)
							@modelProperty(['title' => $field->name])
								{{ $item->getAttribute($field->attribute) }}
							@endmodelProperty
						@endforeach
					</div>
					{{-- END form --}}
				</div>
				{{-- END card-body --}}
			</div>
			{{-- END card --}}
		</div>
		{{-- END col --}}

		<div class="col-md-4">
			@include('nexus::misc/models/additional-information', ['model' => $item])
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5 justify-content-center">
		<div class="col-md-12">
			@include('nexus::misc/models/delete-action', ['model' => $item])
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endsection
