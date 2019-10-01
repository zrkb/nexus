<?php

namespace Pandorga\Laramie\Fields;

use Pandorga\Laramie\Models\Permission;

class PermissionActions extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'permission-actions-field';

    public function actions()
    {
    	return Permission::defaultActions();
    }
}
