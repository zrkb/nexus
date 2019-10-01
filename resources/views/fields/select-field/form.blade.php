<div class="form-group">
	{{ form()->label($field->attribute, $field->name, ['class' => 'control-label']) }}
	{{ form()->select($field->attribute, $field->options(), null, $field->extraAttributes() }}
</div>
