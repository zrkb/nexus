<?php

namespace Pandorga\Nexus\Http\Controllers;

use Illuminate\Http\Request;
use Pandorga\Nexus\Http\Controllers\BaseController;
use Pandorga\Nexus\Models\Permission;

class PermissionsController extends BaseResourceController
{
	protected $resource = '\Pandorga\Nexus\Resources\PermissionResource';

    public function create()
    {
        $item = $this->resource::newModel(['guard_name' => 'admin']);
        $resource = new $this->resource($item);

        return view('nexus::resources/create', compact('item', 'resource'));
    }

	public function store(Request $request)
	{
        $model = $this->resource::newModel();
        $resource = new $this->resource($model);

        $this->validate($request, $resource->createRules());

		foreach ($request->actions as $action) {
			Permission::create([
				'name' => $action . '_' . $request->name,
				'guard_name' => $request->guard_name,
			]);
		}

		session()->flash('success', 'Los Permisos han sido añadidos exitosamente.');

		return redirect(resource('index'));
	}
}
