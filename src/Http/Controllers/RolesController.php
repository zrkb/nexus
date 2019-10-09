<?php

namespace Nexus\Http\Controllers;

use Illuminate\Http\Request;
use Nexus\Http\Controllers\BaseController;
use Nexus\Models\Permission;
use Nexus\Models\Role;
use Nexus\Traits\HasResource;
use Nexus\Traits\PermissionModerator;

class RolesController extends BaseController
{
	use PermissionModerator;
	use HasResource;

	protected $model = \Nexus\Models\Role::class;

	public function index()
	{
		$roles = Role::all();

		return view('nexus::roles/index', compact('roles'));
	}

	public function show($id)
	{
		$role = Role::find($id);
		$permissions = Permission::groupedByRoutes();
		
		return view('nexus::roles/show', compact('role', 'permissions'));
	}

	public function create()
	{
		$permissions = Permission::groupedByRoutes();

		return view('nexus::roles/create', compact('permissions'));
	}

	public function store(Request $request)
	{
		$creationRules = $this->creationRules();
		$this->validate($request, $creationRules);

		// Remove unexistent data from rules
		$data = array_intersect_key($request->all(), $creationRules);

		$role = Role::create($data);

		if ($role) {
			$this->manageRole($request, $role);
			session()->flash('success', 'El registro ha sido creado exitosamente.');
		} else {
			session()->flash('error', 'Error al crear el registro. Consulte con el administrador.');
		}

		return redirect(resource('index'));
	}

	public function edit($id)
	{
		$role = Role::find($id);
		$permissions = Permission::groupedByRoutes();

		return view('nexus::roles/edit', compact('role', 'permissions'));
	}

	public function update(Request $request, $id)
	{
		$role = Role::find($id);

		$updateRules = $this->updateRules($role->id);
		$this->validate($request, $updateRules);

		// Remove unexistent data from rules
		$data = array_intersect_key($request->all(), $updateRules);

		if ($role->update($data)) {
			$this->manageRole($request, $role);
			session()->flash('success', 'El registro ha sido modificado exitosamente.');
		} else {
			session()->flash('error', 'Error al modificar el registro. Consulte con el administrador.');
		}

		return redirect(resource('show', $id));
	}

	private function creationRules() : array
	{
		return [
			'name'			=> 'required|unique:roles,name',
			'guard_name'	=> 'required',
		];
	}

	private function updateRules($id) : array
	{
		return [
			'name' => 'required|unique:roles,name,' . $id,
		];
	}
}
