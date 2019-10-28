@extends('nexus::layouts/table')

@section('content')

	<!-- START page-title -->
	@component('nexus::misc/page-title')
		@slot('superactions')
			<a href="{{ resource('create') }}" class="btn btn-primary lift">
				Añadir
				<i class="bx bx-plus ml-1"></i>
			</a>
		@endslot

		@include('nexus::misc/models/segments')

		Administradores
	@endcomponent
	<!-- END page-title -->
	
	<!-- START table -->
	@component('nexus::misc/table', ['items' => $admins])

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
