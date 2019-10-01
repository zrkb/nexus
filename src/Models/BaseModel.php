<?php

namespace Pandorga\Laramie\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Pandorga\Laramie\Traits\HasCustomFilters;
use Pandorga\Laramie\Traits\HasPrevNext;
use Pandorga\Laramie\Traits\HasSegments;
use Pandorga\Laramie\Traits\ResourceModel;

abstract class BaseModel extends Model
{
	use ResourceModel, HasCustomFilters, HasSegments, HasPrevNext;

	public function getCreatedAttribute()
	{
		return $this->created_at->formatLocalized('%b %d, %Y');
	}

	public function scopeSortedByName($query, $column = 'name')
	{
		$query->orderBy($column);
	}

	public function has(string $relation, $value, string $key = 'id') : bool
	{
		$list = $this->{$relation}
			->pluck($key)
			->toArray();

		return in_array($value, $list);
	}

	public function searchEnumValue($enumType, string $field)
	{
		$elements = $enumType::getElements();
		$fieldValue = $this->{$field};

		$index = $elements->search(function ($item, $key) use ($fieldValue) {
		    return $item['slug'] == $fieldValue;
		});

		return is_int($index) ? $elements[$index]['name'] : $fieldValue;
	}

	public function columnExists($column)
	{
		return Schema::hasColumn($this->getTable(), $column);
	}
}
