@extends('nexus::layouts/table')

@section('content')

	<div class="root">
		@component('nexus::misc/page-title')
			@slot('icon')
				<a class="page-icon">
					<span class="bg-primary text-white">
						<i data-feather="activity" class="feather"></i>
					</span>
				</a>
			@endslot

			Actividades
		@endcomponent

		@include('nexus::misc/table-tools')

		<div class="card">
			@if ($activities->isNotEmpty())
				<div class="table-responsive">
					<table class="table table-striped datatable" data-column-order="5:desc">
						<thead>
							<tr>
								<th class="tid">#ID</th>
								<th>Responsable</th>
								<th>Log</th>
								<th>Descripción</th>
								<th>Modelo</th>
								<th>Fecha</th>
							</tr>
						</thead>
						<tbody>
							@foreach($activities as $activity)
								<tr>
									<td class="tid">{{ $activity->id }}</td>
									<td>
										@if ($activity->causer)
											<div class="user-avatar mr-2">
												<span class="no-image-user" title="{{ $activity->causer->fullname }}">
													{{ $activity->causer->initials }}
												</span>
											</div>
											<a href="{{ route('admins.show', $activity->causer->id) }}">
												{{ $activity->causer->fullname }}
											</a>
										@else
											<div class="user-avatar mr-2">
												<span class="no-image-user" title="System">
													S
												</span>
											</div>

											System
										@endif
									</td>
									<td>
										{{ $activity->log_name }}
									</td>
									<td>
										{{ $activity->description }}
									</td>
									<td>
										{{ $activity->subject_type ?? '--' }}
									</td>
									<td>
										{{ $activity->created_at }}
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
