@extends('laramie::layouts/table')

@section('content')

	<div class="root">
		@component('laramie::misc/page-title')
			@slot('superactions')
				<a href="{{ resource('create') }}" class="btn btn-primary">
					Añadir 
					<i data-feather="plus" class="feather"></i>
				</a>
			@endslot

			@slot('icon')
				<a class="page-icon">
					<span class="bg-primary text-white">
						<i data-feather="shield" class="feather"></i>
					</span>
				</a>
			@endslot

			Permisos
		@endcomponent

		@include('laramie::misc/table-tools')

		<div class="card">
			@if ($permissions->isNotEmpty())
				<div class="table-responsive">
					<table class="table table-striped datatable">
						<thead>
							<tr>
								<th class="tid">#ID</th>
								<th>Nombre</th>
								<th>Canal</th>
								<th>Creado</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($permissions as $permission)
								<tr>
									<td class="tid">{{ $permission->id }}</td>
									<td>
										<a href="{{ resource('show', ['id' => $permission->id]) }}">
											{{ $permission->name }}
										</a>
									</td>
									<td>
										<span class="badge badge-secondary">{{ $permission->guard_name }}</span>
									</td>
									<td>
										{{ $permission->created_at }}
									</td>
									<td class="actions text-center">
										@include('laramie::misc/models/crud-actions', ['model' => $permission])
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{-- END datatables --}}
				</div>
				{{-- END table-responsive --}}
			@else
				@include('laramie::layouts/empty', [
					'route' => resource('create'),
				])
			@endif
		</div>
		<!-- END card -->
	</div>
	{{-- END root --}}

@endsection