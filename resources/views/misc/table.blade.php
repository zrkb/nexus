@if ($items->isNotEmpty())
	<div class="card-header">
		@include('nexus::misc/table-tools')
	</div>
	
	<div class="table-responsive">
		<table class="table table-hover card-table datatable">

			@isset($thead)
				<thead>
					<tr>
						{{ $thead }}
					</tr>
				</thead>
			@endisset

			@isset($tbody)
				<tbody>
						<tr>
							{{ $tbody }}
						</tr>
				</tbody>
			@endisset

			@isset($tfoot)
				<tfoot>
						<tr>
							{{ $tfoot }}
						</tr>
				</tfoot>
			@endisset

		</table>
		{{-- END datatables --}}
	</div>
	{{-- END table-responsive --}}
@else
	@include('nexus::layouts/empty', [
		'route' => resource('create'),
	])
@endif
