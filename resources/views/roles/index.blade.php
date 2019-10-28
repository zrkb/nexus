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

		Roles
	@endcomponent
	<!-- END page-title -->

	@messages

	<!-- START table -->
	@component('nexus::misc/table', ['items' => $roles])

		<!-- START thead -->
		@slot('thead')
			<tr>
				<th class="tid">#ID</th>
				<th>Nombre</th>
				<th>Creado</th>
				<th class="text-center">Acciones</th>
			</tr>
		@endslot
		<!-- END thead -->

		<!-- START tbody -->
		@slot('tbody')
			@foreach($roles as $role)
				<tr>
					<td class="tid">{{ $role->id }}</td>
					<td>
						<a href="{{ resource('edit', $role->id) }}">
							{{ $role->name }}
						</a>
					</td>
					<td>
						{{ $role->created_at }}
					</td>
					<td class="actions text-center">
						@include('nexus::misc/models/crud-actions', ['model' => $role])
					</td>
				</tr>
			@endforeach
		@endslot
		<!-- END tbody -->
		
	@endcomponent
	<!-- END table -->

@endsection
