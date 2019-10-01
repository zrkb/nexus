@extends('laramie::layouts/master')

@section('content')

	<div class="row mb-5">
		<div class="col">
			<h4 class="page-title">
				Upload File
			</h4>
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

	<div class="row mb-5">
		<div class="col">
			<form method="post" action="{{ route('upload') }}" enctype="multipart/form-data" novalidate class="upload-box">

				{{ csrf_field() }}

				<div class="upload-input">
					<svg width="48px" height="34px" viewBox="0 0 48 34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="upload-icon">
						<path d="M39,34 L12,34 C5.383,34 0,28.617 0,22 C0,15.703 4.875,10.523 11.05,10.037 C11.698,3.811 18.591,0 25,0 C33.271,0 40,7.178 40,16 L40,16.057 C44.494,16.555 48,20.375 48,25 C48,29.963 43.962,34 39,34 Z M26.0769231,26 L26.0769231,19.5384615 L30.9140308,19.5384615 L24.4615385,12 L18,19.5384615 L22.8461538,19.5384615 L22.8461538,26 L26.0769231,26 Z" id="cloud"></path>
					</svg>
					<input type="file" name="files[]" id="file" class="upload-file" data-multiple-caption="{count} files selected" multiple />
					<label for="file">
						<span class="upload-dragndrop d-block">Arrastra una imagen aquí o bien</span>
						<span class="btn btn-primary mt-3">Selecciona un archivo</span>
					</label>
					<button type="submit" class="upload-button">Upload</button>
				</div>
				<div class="upload-uploading">
					<div class="progress">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
					</div>
				</div>
				<div class="upload-success">Done! <a href="./" class="upload-restart" role="button">Upload more?</a></div>
				<div class="upload-error">Error! <span></span>. <a href="./" class="upload-restart" role="button">Try again!</a></div>
			</form>
			<!-- END upload-box -->
		</div>
		{{-- END col --}}
	</div>
	{{-- END row --}}

@endsection