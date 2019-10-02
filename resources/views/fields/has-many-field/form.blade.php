<div class="form-group">
	{{ form()->label($field->attribute, $field->name, ['class' => 'control-label']) }}

	@include('nexus::misc/form/one-to-many', [
		'resource' => $field->relationItems(),
		'slug' => 'admins',
		'model' => $item ?? null,
		'checked' => 'hasAdmin',
		'title' => 'fullname',
	])
</div>
