<?php

namespace Nexus\Traits;

use Nexus\Contracts\Resolvable;

trait ResourceFields
{
    public function indexFields()
    {
        return collect($this->fields())->filter->showOnIndex;
    }

    public function detailFields()
    {
        return collect($this->fields())->filter->showOnDetail;
    }

    public function creationFields()
    {
        return collect($this->fields())->filter->showOnCreation;
    }

    public function updateFields()
    {
        return collect($this->fields())->filter->showOnUpdate;
    }
}
