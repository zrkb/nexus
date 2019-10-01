@extends('laramie::layouts/table')

@section('content')

	@component('laramie::misc/page-title')
		@slot('superactions')
			<a href="{{ resource('create') }}" class="btn btn-primary lift">
				Añadir
				<i class="bx bx-plus ml-1"></i>
			</a>
		@endslot

		@include('laramie::misc/models/segments')

		{{ $resource->label() }}
	@endcomponent

    @include('laramie::layouts/errors')
    @include('laramie::layouts/flash')

	<div class="card">

		@if ($items->isNotEmpty())
			<div class="card-header">
				@include('laramie::misc/table-tools')
			</div>
			
			<div class="table-responsive">
				<table class="table table-hover card-table datatable">
					<thead>
						<tr>
							@foreach ($resource->indexFields() as $field)
								@php
									$tdClass =  in_array($field->attribute, ['id', 'image']) ? 'class=tid' : ''
								@endphp
								<th {{ $tdClass }}>{{ $field->name }}</th>
							@endforeach

							@if ($resource::newModel()->hasSoftDelete())
								<th class="text-center">Status</th>
							@endif

							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $item)
							<tr>
								@foreach ($resource->indexFields() as $field)
									@php
										$tdClass = $field->attribute == 'id' ? 'class=tid' : ''
									@endphp
									<td {{ $tdClass }}>
										{!! html_entity_decode($field->renderForIndex($item, $resource)) !!}
									</td>
								@endforeach

								@if ($item->hasSoftDelete())
									<td class="actions text-center">
										@include('laramie::misc/models/status-badge', ['model' => $item])
									</td>
								@endif
								
								<td class="actions text-center">
									@include('laramie::misc/models/crud-actions', ['model' => $item])
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

@endsection
