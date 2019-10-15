@php
	$relation = $item->belongsTo($field->resourceClass::$model, $field->belongsToRelationship, 'id')->first();
@endphp

{{ $relation ? $relation->getAttribute($field->relationField)->getAttribute($field->resourceClass::$title) : '' }}
