<div class="form-group">
	{{ form()->label($field->attribute, $field->name, ['class' => 'control-label']) }}
	{{ form()->select($field->attribute, $field->options(), null, ['class' => 'form-control', 'data-toggle' => 'select', 'placeholder' => '--']) }}
</div>
