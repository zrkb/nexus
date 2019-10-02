<?php

namespace Pandorga\Nexus\Models;

use Pandorga\Nexus\Traits\HasPrevNext;
use Pandorga\Nexus\Traits\ResourceModel;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Role extends \Spatie\Permission\Models\Role
{
	use ResourceModel, HasPrevNext;
}
