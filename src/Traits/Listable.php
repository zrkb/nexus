<?php

namespace Pandorga\Laramie\Traits;

use Illuminate\Support\Collection;

trait Listable
{
    public function getFields() : Collection
    {
        return is_null($this->fields)
        		? new Collection
        		: collect($this->fields);
    }
}
