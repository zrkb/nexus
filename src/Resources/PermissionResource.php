<?php

namespace Nexus\Resources;

use Illuminate\Http\Request;
use Nexus\Fields\ID;
use Nexus\Fields\PermissionActions;
use Nexus\Fields\Text;

class PermissionResource extends Resource
{
    /**
     * The underlying model resource instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    public static $model = \Nexus\Models\Permission::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields()
    {
        return [
            ID::make(),
            Text::make('Nombre', 'name'),
            Text::make('Guard', 'guard_name'),
            PermissionActions::make()
                ->onlyOnForms()
                ->hideWhenUpdating(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public static function label()
    {
        return 'Permisos';
    }

    /**
     * {@inheritDoc}
     */
    public static function singularLabel()
    {
        return 'Permiso';
    }

    /**
     * {@inheritDoc}
     */
    public static function uriKey()
    {
        return 'permissions';
    }

    public function createRules() : array
    {
        return [
            'name'          => 'required',
            'guard_name'    => 'required',
            'actions'       => 'required|array|min:1',
            'actions.*'     => 'required|string|distinct',
        ];
    }

    public function updateRules($resourceId) : array
    {
        return [
            'name'          => 'required',
            'guard_name'    => 'required',
        ];
    }
}
