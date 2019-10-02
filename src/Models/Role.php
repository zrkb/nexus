<?php

namespace Nexus\Models;

use Nexus\Traits\HasPrevNext;
use Nexus\Traits\ResourceModel;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Role extends \Spatie\Permission\Models\Role
{
	use ResourceModel, HasPrevNext;
}
