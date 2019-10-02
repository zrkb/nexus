@extends('nexus::layouts/app')

@section('content')

	<div class="root">

		@include('nexus::misc/models/restore-panel', ['model' => $admin])

		@component('nexus::misc/page-title')
			@slot('superactions')
				<div class="float-right">
					<a href="{{ resource('edit', ['id' => $admin->id]) }}" class="btn btn-success">
						<i class="bx bx-pencil mr-2"></i>
						Editar
					</a>
					<a href="{{ resource('index') }}" class="btn btn-default">
						Volver a la lista
					</a>
				</div>
			@endslot

			@slot('icon')
				<a class="page-icon">
					<span title="{{ $admin->fullname }}">{{ $admin->initials }}</span>
				</a>
			@endslot

			<span class="text-primary">#{{ $admin->id }}</span>
			<span class="text-muted">&rarr;</span>
			{{ $admin->fullname }}
		@endcomponent

		<div class="row mb-5 justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title mb-4 pb-4 border-bottom">
							<i class="bx bx-layer text-primary mr-2"></i>
							Datos del Registro
						</h5>

						<div class="form mt-3">
							@modelProperty(['title' => 'Nombre Completo'])
								{{ $admin->fullname }}
							@endmodelProperty

							@modelProperty(['title' => 'Email'])
								{{ $admin->email }}
							@endmodelProperty

							@modelProperty(['title' => 'Creado'])
								{{ $admin->accountAge }}
							@endmodelProperty
						</div>
						{{-- END form --}}
					</div>
					{{-- END card-body --}}
				</div>
				{{-- END card --}}
			</div>
			{{-- END col --}}

			<div class="col-md-4">
				@include('nexus::misc/models/additional-information', ['model' => $admin])
			</div>
			{{-- END col --}}
		</div>
		{{-- END row --}}

		@if ($admin->id != admin()->id)
			<div class="row mb-5 justify-content-center">
				<div class="col-md-12">
					@include('nexus::misc/models/delete-action', ['model' => $admin])
				</div>
				{{-- END col --}}
			</div>
			{{-- END row --}}
		@endif
		
	</div>
	{{-- END root --}}

@endsection
