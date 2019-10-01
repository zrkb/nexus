@if ($media->isImage()) 
	<div class="user-avatar rounded mr-2"
		style="background-image: url('{{ $media->getUrl() }}');">
		&nbsp;
	</div>
@else
	<div class="file-icon mr-2">
		<img src="/img/file-icon.svg" alt="{{ $media->name }}">
	</div>
@endif