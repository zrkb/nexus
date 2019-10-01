@extends('laramie::layouts/app')

@section('content')

	<div class="root">

		@include('laramie::misc/models/restore-panel', ['model' => $permission])
		
		@component('laramie::misc/page-title')
			@slot('superactions')
				<div class="float-right">
					<a href="{{ resource('edit', ['id' => $permission->id]) }}" class="btn btn-success">
						<i data-feather="edit-2" class="mr-2"></i>
						Editar
					</a>
					<a href="{{ resource('index') }}" class="btn btn-default">
						Volver a la lista
					</a>
				</div>
			@endslot

			@slot('icon')
				<a class="page-icon">
					<span class="bg-primary text-white">
						<i data-feather="package" class="feather"></i>
					</span>
				</a>
			@endslot

			<span class="text-primary">#{{ $permission->id }}</span>
			<span class="text-muted">&rarr;</span>
			{{ $permission->name }}
		@endcomponent

		<div class="row mb-5 justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title mb-4 pb-4 border-bottom">
							<i data-feather="layers" class="mr-2 text-primary"></i>
							Datos del Registro
						</h5>

						<div class="form mt-3">
							@modelProperty(['title' => 'Nombre'])
								{{ $permission->name }}
							@endmodelProperty

							@modelProperty(['title' => 'Creado'])
								{{ $permission->created_at }}
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
				@include('laramie::misc/models/additional-information', ['model' => $permission])
			</div>
			{{-- END col --}}
		</div>
		{{-- END row --}}
		
		<div class="row mb-5 justify-content-center">
			<div class="col-md-12">
				@include('laramie::misc/models/delete-action', ['model' => $permission])
			</div>
			{{-- END col --}}
		</div>
		{{-- END row --}}

	</div>
	{{-- END root --}}

@endsection
