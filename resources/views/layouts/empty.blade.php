<div class="card-body text-center">

	<div class="my-5 pb-3">
		<!-- Image -->
		<img src="{{ assets_path() }}/assets/img/illustrations/coworking.svg" alt="..." class="img-fluid mb-4" style="max-width: 250px;">

		<!-- Title -->
		<h1>
			{{ $message ?? 'No se encontraron resultados' }}
		</h1>

		@isset($description)
			<!-- Subtitle -->
			<p class="text-muted">
				{{ $description }}
			</p>
		@endisset

		<!-- Button -->
		@isset($route)
			<a href="{{ $route }}" class="btn btn-primary px-4 lift">
				Añadir
			</a>
		@endisset
	</div>

</div>
