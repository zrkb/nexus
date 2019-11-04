<div class="card">
	@if (count($items))
		<div class="card-header">
			@include('nexus::misc/table-tools')
		</div>
		
		<div class="table-responsive">
			<table class="table table-hover card-table datatable">

				@isset($thead)
					<thead>
						{{ $thead }}
					</thead>
				@endisset

				@isset($tbody)
					<tbody>
						{{ $tbody }}
					</tbody>
				@endisset

				@isset($tfoot)
					<tfoot>
						{{ $tfoot }}
					</tfoot>
				@endisset

			</table>
			{{-- END datatables --}}
		</div>
		{{-- END table-responsive --}}
	@else
		@include('nexus::layouts/empty')
	@endif
</div>
