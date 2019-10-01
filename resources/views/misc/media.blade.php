@if ($media->isImage())
	<img src="{{ $media->getPublicPath() }}" class="img-fluid img-thumbnail rounded" alt="{{ $media->name }}">
@else
	<img src="/img/file-icon.svg" class="img-content" alt="{{ $media->name }}">
@endif