<?php

namespace Nexus\Models;

use Nexus\Traits\HasPrevNext;
use Nexus\Traits\ResourceModel;

class Role extends \Spatie\Permission\Models\Role
{
    use ResourceModel, HasPrevNext;
}
