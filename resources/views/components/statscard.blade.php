<div class="card card-body">
	<div class="row align-items-center">
		<div class="col">
			<!-- Title -->
			<h6 class="card-title text-uppercase text-muted mb-2">
				{{ $title }}
			</h6>
			
			<!-- Heading -->
			<span class="h2 mb-0">
				{{ $heading }}
			</span>

			{{ $slot }}
		</div>
		
		@isset($icon)
			<div class="col-auto">
				{{ $icon }}
			</div>
		@endisset
	</div>
	<!-- END row -->
</div>
<!-- END card -->
