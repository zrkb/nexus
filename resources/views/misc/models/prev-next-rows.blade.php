@php
	$prev = $model->prev();
	$next = $model->next();
	$buttonStyle = 'btn-white';
@endphp

<a href="{{ resource('show', $prev ? $prev->id : $model->id) }}" role="button"
	@if ($prev)
		class="btn {{ $buttonStyle }}"
		title="Anterior"
	@else
		class="btn {{ $buttonStyle }} disabled" tabindex="-1" aria-disabled="true"
	@endif>
	<i class='bx bx-chevron-left'></i>
</a>

<a href="{{ resource('show', $next ? $next->id : $model->id) }}" role="button"
	@if ($next)
		class="btn {{ $buttonStyle }}"
		title="Siguiente"
	@else
		class="btn {{ $buttonStyle }} disabled" tabindex="-1" aria-disabled="true"
	@endif>
	<i class='bx bx-chevron-right'></i>
</a>
