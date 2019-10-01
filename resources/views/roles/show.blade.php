@extends('laramie::layouts/app')

@section('content')

	<div class="root">

		@include('laramie::misc/models/restore-panel', ['model' => $role])
		
		@component('laramie::misc/page-title')
			@slot('superactions')
				<div class="float-right">
					<a href="{{ resource('edit', ['id' => $role->id]) }}" class="btn btn-success">
						<i data-feather="edit-2" class="mr-2"></i>
						Editar
					</a>
					<a href="{{ resource('index') }}" class="btn btn-default">
						<i data-feather="list" class="mr-2"></i>
						Volver
					</a>

					@include('laramie::misc/models/prev-next-rows', ['model' => $role])
				</div>
			@endslot

			@slot('icon')
				<a class="page-icon">
					<span class="bg-primary text-white">
						<i data-feather="star" class="feather"></i>
					</span>
				</a>
			@endslot

			<span class="text-primary">#{{ $role->id }}</span>
			<span class="text-muted">&rarr;</span>
			{{ $role->name }}
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
								{{ $role->name }}
							@endmodelProperty

							@modelProperty
								<table class="table">
									<thead>
										<tr>
											<th class="w-50">Permisos</th>
											<th class="text-center" style="width: 12.5%">Ver</th>
											<th class="text-center" style="width: 12.5%">Agregar</th>
											<th class="text-center" style="width: 12.5%">Modificar</th>
											<th class="text-center" style="width: 12.5%">Eliminar</th>
										</tr>
									</thead>
									<tbody>
										@foreach($permissions as $name => $actions)
											<tr>
												<td>
													<strong>{{ __m($name) }}</strong>
												</td>
												@foreach($actions as $action)

													@php
														$roleHasPermission = isset($role) ? $role->hasPermissionTo($action->name) : false;
													@endphp

													<td class="text-center">
														@if ($roleHasPermission)
															<i class='bx bx-check text-primary'></i>
														@endif
													</td>
												@endforeach
											</tr>
										@endforeach
									</tbody>
								</table>
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
				@include('laramie::misc/models/additional-information', ['model' => $role])
			</div>
			{{-- END col --}}
		</div>
		{{-- END row --}}
		
		<div class="row mb-5 justify-content-center">
			<div class="col-md-12">
				@include('laramie::misc/models/delete-action', ['model' => $role])
			</div>
			{{-- END col --}}
		</div>
		{{-- END row --}}

	</div>
	{{-- END root --}}

@endsection
