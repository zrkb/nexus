<div class="card">
	<div class="card-body">
		@foreach ($fields as $field)
			{!! $field->renderForForm($item, $resource) !!}
		@endforeach
	</div>
</div>
