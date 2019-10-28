@extends('nexus::layouts/app')

@section('content')

	@include('nexus::misc/models/restore-panel', ['model' => $role])
	
	@component('nexus::misc/page-title')
		@slot('superactions')
			<a href="{{ resource('edit', $role->id) }}" class="btn btn-success">
				<i class="bx bx-pencil mr-2"></i>
				Editar
			</a>
		
			@include('nexus::components/back-to-resource')

			@include('nexus::misc/models/prev-next-rows', ['model' => $role])
		@endslot

		<span class="text-primary">#{{ $role->id }}</span>
		<span class="text-muted">&rarr;</span>
		{{ $role->name }}
	@endcomponent

	<div class="row mb-5 justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3 class="card-title mb-4 pb-4 border-bottom font-weight-normal">
						<i class="bx bx-layer text-primary mr-2"></i>
						Datos del Registro
					</h3>

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
			@include('nexus::misc/models/additional-information', ['model' => $role])
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}
	
	<div class="row mb-5 justify-content-center">
		<div class="col-md-12">
			@include('nexus::misc/models/delete-action', ['model' => $role])
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endsection
