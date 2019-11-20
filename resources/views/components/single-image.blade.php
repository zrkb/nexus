@php
	$uniqid = uniqid();
@endphp

<!-- Single -->
<div class="dropzone dropzone-single"
	data-toggle="dropzone-custom"
	data-options='{ "url": "{{ $route ?? route('images.store') }}", "maxFiles": 1, "acceptedFiles": "image/*"}'
	data-input-name="{{ $name ?? "image-{$uniqid}" }}"
	data-image-path="{{ $imagePath }}"
	data-storage-url="{{ Storage::url($imagePath) }}"
	@isset($image)
		data-image="{{ $image->basename }}"
	@endisset>

	<div class="dz-message" data-dz-message>
		<span>{{ $message ?? 'Elija una imagen' }}</span>
	</div>

	<!-- Fallback -->
	<div class="fallback">
		<div class="custom-file">
			<input type="file" class="custom-file-input" id="image-{{ $uniqid }}">
			<label class="custom-file-label" for="image-{{ $uniqid }}">Selecciona una imagen</label>
		</div>
	</div>

	<!-- Preview -->
	<div class="dz-preview dz-preview-single">
		<div class="dz-preview-cover">
			<img class="dz-preview-img" src="" alt="..." data-dz-thumbnail>
			<a href="#" class="text-danger" role="button" data-dz-remove>
				<small><i class="bx bx-trash"></i></small>
			</a>
		</div>
	</div>

	<div class="progress">
		<div class="progress-bar progress-bar-striped bg-primary progress-bar-animated" role="progressbar" data-dz-uploadprogress>
			<span class="progress-text"></span>
		</div>
	</div>
</div>
