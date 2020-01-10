<div class="card">
	<div class="card-body">
		@foreach ($fields as $field)
			{!! $field->renderForForm($item, $resource)->render() !!}
		@endforeach
	</div>
</div>
