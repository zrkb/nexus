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
				<th>Email</th>
				<th>Roles</th>
				<th>Estado</th>
				<th></th>
			</tr>
		@endslot
		<!-- END thead -->

		<!-- START tbody -->
		@slot('tbody')
			@foreach($admins as $admin)
				<tr>
					<td class="tid">{{ $admin->id }}</td>
					<td>
						<div class="avatar avatar-sm mr-2">
							<span class="avatar-title rounded-circle">
								{{ $admin->initials }}
							</span>
						</div>
						<a href="{{ resource('edit', $admin->id) }}">
							@if ($admin->trashed())
								<s class="text-muted">{{ $admin->fullname }}</s>
							@else
								{{ $admin->fullname }}
							@endif
						</a>
					</td>
					<td>
						{{ $admin->email }}
					</td>
					<td>
						{{ $admin->roles->implode('name', ', ') }}
					</td>
					<td>
						@include('nexus::misc/models/status-badge', ['model' => $admin])
					</td>
					<td class="actions text-center">
						@include('nexus::misc/models/crud-actions', ['model' => $admin])
					</td>
				</tr>
			@endforeach
		@endslot
		<!-- END tbody -->
		
	@endcomponent
	<!-- END table -->

@endsection
