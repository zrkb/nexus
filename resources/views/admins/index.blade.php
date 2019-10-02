@extends('nexus::layouts/table')

@section('content')

	<div class="root">
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

		<div class="card">
			<div class="card-header">
				@include('nexus::misc/table-tools')
			</div>

			@if ($admins->isNotEmpty())
				<div class="table-responsive">
					<table class="table table-hover card-table datatable">
						<thead>
							<tr>
								<th class="tid">#ID</th>
								<th>Nombre</th>
								<th>Email</th>
								<th>Roles</th>
								<th>Estado</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($admins as $admin)
								<tr>
									<td class="tid">{{ $admin->id }}</td>
									<td>
										<div class="avatar avatar-sm mr-2">
											<span class="avatar-title rounded-circle">
												{{ $admin->initials }}
											</span>
										</div>
										<a href="{{ resource('show', ['id' => $admin->id]) }}">
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
						</tbody>
					</table>
					{{-- END datatables --}}
				</div>
				{{-- END table-responsive --}}
			@else
				@include('nexus::layouts/empty', [
					'route' => resource('create'),
				])
			@endif
		</div>
		<!-- END card -->
	</div>
	{{-- END root --}}

@endsection
