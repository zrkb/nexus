@php
	$relation = $item->belongsTo($field->resourceClass::$model, 'category_id', 'id')->first();
@endphp

{{ $relation ? $relation->getAttribute($field->resourceClass::$title) : '' }}
