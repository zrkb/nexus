<div class="avatar avatar-sm">
	@if ($image = $item->getAttribute($field->attribute))
		<img src="{{ Storage::url($item::imagesPath($image->basename)) }}" alt="{{ $item->name }}" class="avatar-img rounded">
	@else
		<img src="/backend/assets/img/icon-image.svg" alt="..." class="avatar-img">
	@endif
</div>
