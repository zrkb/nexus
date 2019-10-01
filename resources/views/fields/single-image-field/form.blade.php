<div class="form-group">
	{{ form()->label($field->attribute, $field->name, ['class' => 'control-label']) }}
	
	@include('laramie::components/single-image', [
		'name' => $field->attribute,
		'message' => $field->placeholder,
		'image' => $item->exists ? $item->getAttribute($field->attribute) : null,
		'imagePath' => $resource->model()::imagesPath(),
	])
</div>
