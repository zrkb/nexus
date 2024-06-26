<?php

namespace Nexus\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Nexus\Traits\HasCustomFilters;
use Nexus\Traits\HasPrevNext;
use Nexus\Traits\HasSegments;
use Nexus\Traits\ResourceModel;

abstract class BaseModel extends Model
{
    use ResourceModel;
    use HasCustomFilters;
    use HasSegments;
    use HasPrevNext;

    public function getCreatedAttribute()
    {
        return $this->created_at->translatedFormat('M d, Y');
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
