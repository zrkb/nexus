<?php

namespace Pandorga\Laramie\Models;

use Pandorga\Laramie\Traits\HasPrevNext;
use Pandorga\Laramie\Traits\ResourceModel;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Role extends \Spatie\Permission\Models\Role
{
	use ResourceModel, HasPrevNext;
}