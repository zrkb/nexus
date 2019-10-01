<div class="form-group">
	{{ form()->label('actions', 'Acciones', ['class' => 'control-label']) }}

	{{ old('actions[]') }}

	@foreach($field->actions() as $action => $label)
		<div class="custom-control custom-checkbox mt-3">
				{{ form()->checkbox("actions[{$action}]", $action, true, ['id' => "action_{$action}", 'class' => 'custom-control-input']) }}
			<label class="custom-control-label" for="action_{{ $action }}">
				{{ $label }}
			</label>
		</div>
	@endforeach
</div>
