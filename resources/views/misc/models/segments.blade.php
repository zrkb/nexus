@isset ($resource)
	@php
		$model = $resource::newModel();
	@endphp
	@if (method_exists($model, 'segments') && count($model->segments()) > 0)
		<div class="row align-items-center">
			<div class="col">
				<!-- Nav -->
				<ul class="nav nav-tabs nav-overflow header-tabs">
					@foreach ($model->segments() as $segment)
						<li class="nav-item">
							<a href="{{ resource('index') }}?segment={{ $segment->key() }}" class="nav-link {{ $segment->isActive() ? 'active' : '' }}">
								{{ $segment->name }}
							</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	@endif
@endisset