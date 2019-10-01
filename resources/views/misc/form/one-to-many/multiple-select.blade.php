@isset($title)
	<div class="text-muted">→ {{ form()->label($slug, $title, ['class' => 'control-label']) }}</div>
@endisset

{{
	form()->select(
		"{$slug}[]",
		$resource->pluck('name', 'id'),
		isset($model) ? $model->{$relation ?? $slug}->pluck('id', 'name') : null,
		[
			'id' => $slug,
			'class' => 'form-control',
			'data-toggle' => 'select',
			'data-tags' => 'true',
			'multiple'
		]
	)
}}
