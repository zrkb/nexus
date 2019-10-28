@foreach (['danger', 'warning', 'success', 'info'] as $type)
	@if (session()->has($type))
		<div class="alert alert-{{ $type }} m-0 mb-5" role="alert">
			<button type="button" class="close px-2" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>

			<p class="p-0 m-0">{{ session($type) }}</p>
		</div>
	@endif
@endforeach
