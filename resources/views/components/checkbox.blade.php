@php
	$class = $class ?? '';
@endphp

<div class="custom-control custom-checkbox my-2">
	{{ form()->checkbox("{$name}", $value, null, ['class' => "custom-control-input {$class}", 'id' => "{$id}"]) }}
	<label class="custom-control-label m-0" for="{{ $id }}">
		{{ $slot }}
	</label>
	{{ $extra ?? '' }}
</div>
