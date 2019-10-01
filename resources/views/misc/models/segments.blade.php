{{-- <div class="row align-items-center">
	<div class="col">
		<!-- Nav -->
		<ul class="nav nav-tabs nav-overflow header-tabs">
			<li class="nav-item">
				<a href="" class="nav-link active px-3">
					Todos
					<span class="badge badge-pill badge-soft-secondary ml-2">{{ $admins->count() }}</span>
				</a>
			</li>
		</ul>
	</div>
</div> --}}

@isset($segments)
	<select class="form-control form-segment-dropdown" onchange="var selected = this.options[this.selectedIndex].value; window.location = '{{ resource('index') }}?segment=' + selected;">
		@foreach($segments as $key => $segment)
			<option value="{{ $segment->key() }}" {{ $segment->isActive() ? 'selected' : '' }}>
				{{ $segment->name }}
			</option>
		@endforeach
	</select>
@endisset
