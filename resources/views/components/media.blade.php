@php
	$uniqid = uniqid();
	$isMediaPresent = isset($media);
@endphp

{{ form()->label('file', $title ?? 'Archivo', ['class' => 'control-label']) }}

<div class="upload-wrapper">
	@if ($isMediaPresent)
		<div class="file-preview">

				@if ($media->isImage())
					<img src="{{ $media->getUrl() }}" class="img-fluid img-thumbnail rounded" alt="{{ $media->name }}">
				@else
					<img src="/img/file-icon.svg" class="img-content" alt="{{ $media->name }}">
				@endif
		
				<div class="d-flex justify-content-between py-2">
					<span class="d-inline-block text-truncate" style="max-width: 75%;">
						{{ $media->basename }} <small class="text-muted">({{ $media->getSize() }})</small>
					</span>
			
					<a href="javascript:;" class="text-danger delete-file">
						<i data-feather="trash-2" class="feather"></i>
						<span>Borrar archivo</span>
					</a>
				</div>
		</div>
		{{-- END file-preview --}}
	@endif
	
	<div class="upload-box @if($isMediaPresent) d-none @endif">
		<div class="upload-input">
			<svg width="48px" height="34px" viewBox="0 0 48 34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="upload-icon">
				<path d="M39,34 L12,34 C5.383,34 0,28.617 0,22 C0,15.703 4.875,10.523 11.05,10.037 C11.698,3.811 18.591,0 25,0 C33.271,0 40,7.178 40,16 L40,16.057 C44.494,16.555 48,20.375 48,25 C48,29.963 43.962,34 39,34 Z M26.0769231,26 L26.0769231,19.5384615 L30.9140308,19.5384615 L24.4615385,12 L18,19.5384615 L22.8461538,19.5384615 L22.8461538,26 L26.0769231,26 Z" id="cloud"></path>
			</svg>

			<input
				id="file-{{ $uniqid }}"
				type="file"
				name="file"
				class="upload-file"
				data-multiple-caption="{count} archivos seleccionados"
				@if (isset($multiple) && $multiple == true) multiple @endif
			/>

			<div class="">
				<span class="upload-dragndrop d-block">Arrastra una imagen aquí o bien</span>
			</div>

			<label for="file-{{ $uniqid }}">
				<span class="btn btn-primary mt-3">Selecciona un archivo</span>
			</label>
		</div>
	</div>
	{{-- END upload-box --}}
</div>
{{-- END upload-wrapper --}}