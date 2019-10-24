@extends('nexus::layouts/table')

@section('content')

	<div class="root">
		@component('nexus::misc/page-title')
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

		@include('nexus::misc/table-tools')

	<!-- START table -->
	@component('nexus::misc/table', ['items' => $permissions])

		<!-- START thead -->
		@slot('thead')
			<tr>
				<th class="tid">#ID</th>
				<th>Nombre</th>
				<th>Canal</th>
				<th>Creado</th>
				<th class="text-center">Acciones</th>
			</tr>
		@endslot
		<!-- END thead -->

		<!-- START tbody -->
		@slot('tbody')
			@foreach($permissions as $permission)
				<tr>
					<td class="tid">{{ $permission->id }}</td>
					<td>
						<a href="{{ resource('edit', $permission->id) }}">
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
						@include('nexus::misc/models/crud-actions', ['model' => $permission])
					</td>
				</tr>
			@endforeach
		@endslot
		<!-- END tbody -->
		
	@endcomponent
	<!-- END table -->

@endsection
