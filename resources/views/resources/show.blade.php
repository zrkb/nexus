@extends('nexus::layouts/app')

@section('content')

	@include('nexus::misc/models/restore-panel', ['model' => $item])

	<!-- START page-title -->
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
	<!-- END page-title -->

	@messages

	<!-- START content -->
	<div class="row mb-5 justify-content-center">
		<div class="col-md-8">

			<!-- START card -->
			<div class="card card-body">
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
			</div>
			<!-- END card -->
			
		</div>

		<div class="col-md-4">
			@include('nexus::misc/models/additional-information', ['model' => $item])
		</div>
	</div>
	<!-- END content -->

	<!-- START danger-zone -->
	<div class="row mb-5 justify-content-center">
		<div class="col-md-12">
			@include('nexus::misc/models/delete-action', ['model' => $item])
		</div>
	</div>
	<!-- END danger-zone -->

@endsection
