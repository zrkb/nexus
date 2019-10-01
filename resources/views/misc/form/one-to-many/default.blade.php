@isset($title)
	<div class="text-muted">→ {{ form()->label($slug, $title, ['class' => 'control-label']) }}</div>
@endisset

{{ old("{$slug}") }}

@foreach($resource as $item)
	<div class="custom-control custom-checkbox mb-3">
		{{
			form()->checkbox(
				"{$slug}[]",
				$item->getKey(),
				isset($model) && isset($checked) ? $model->{$checked}($item->getKey()) : null,
				[
					'id' => "{$slug}_{$item->getKey()}",
					'class' => 'custom-control-input',
				]
			)
		}}

		<label class="custom-control-label m-0" for="{{ $slug }}_{{ $item->getKey() }}">
			{{ $item->getAttribute($title ?? 'name') }}
		</label>
	</div>
@endforeach
