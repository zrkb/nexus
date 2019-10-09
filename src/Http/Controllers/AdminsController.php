<?php

namespace Nexus\Http\Controllers;

use Illuminate\Http\Request;
use Nexus\Models\Role;
use Nexus\Traits\HasResource;
use Nexus\Traits\PermissionModerator;

class AdminsController extends BaseController
{
	use PermissionModerator;
	use HasResource;

	protected $resource = '\Nexus\Resources\Admin';

	public function index()
	{
		$admins = config('nexus.models.admin')::withTrashed()->get();

		return view('nexus::admins/index', compact('admins'));
	}

	public function show($id)
	{
		$admin = config('nexus.models.admin')::withTrashed()->find($id);

		return view('nexus::admins/show', compact('admin'));
	}

	public function create()
	{
		$roles = Role::all();

		return view('nexus::admins/create', compact('roles'));
	}

	public function store(Request $request)
	{
		$creationRules = $this->creationRules();
		$this->validate($request, $creationRules);

		// Encrypt password
		$request->merge(['password' => bcrypt($request->password)]);

		// Remove unexistent data from rules
		$data = array_intersect_key($request->all(), $creationRules);

		$admin = config('nexus.models.admin')::create(array_merge($data, [
			'email_verified_at' => now(),
			'remember_token'    => str_random(10),
		]));

		if ($admin) {
			$this->manageAdmin($request, $admin);
			session()->flash('success', 'El registro ha sido creado exitosamente.');
		} else {
			session()->flash('error', 'Error al crear el registro. Consulte con el administrador.');
		}

		return redirect(resource('index'));
	}

	public function edit($id)
	{
		$admin = config('nexus.models.admin')::withTrashed()->find($id);
		$roles = Role::all();

		return view('nexus::admins/edit', compact('admin', 'roles'));
	}

	public function update(Request $request, $id)
	{
		$admin = config('nexus.models.admin')::withTrashed()->find($id);
		
		$updateRules = $this->updateRules($admin->id);
		$this->validate($request, $updateRules);

		// Encrypt password
		if ($request->password) {
			$passwordRules = ['password' => 'sometimes|nullable|min:6'];
			$this->validate($request, $passwordRules);

			$request->merge(['password' => bcrypt($request->password)]);

			$updateRules = array_merge($updateRules, $passwordRules);
		}

		// Remove unexistent data from rules
		$data = array_intersect_key($request->all(), $updateRules);

		if ($admin->update($data)) {
			$this->manageAdmin($request, $admin);
			session()->flash('success', 'El registro ha sido modificado exitosamente.');
		} else {
			session()->flash('error', 'Error al modificar el registro. Consulte con el administrador.');
		}

		return redirect(resource('show', $id));
	}

	private function creationRules() : array
	{
		return [
			'firstname'    => 'required',
			'lastname'     => 'required',
			'email'         => 'required|email|unique:admins,email',
			'password'      => 'required|min:6',
		];
	}

	private function updateRules($id) : array
	{
		return [
			'firstname'    => 'required',
			'lastname'     => 'required',
			'email'         => 'required|email|unique:admins,email,' . $id,
		];
	}
}
