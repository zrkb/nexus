<?php

namespace Nexus\Traits;

use Nexus\Models\Permission;
use Nexus\Models\Role;
use Illuminate\Http\Request;

trait PermissionModerator
{
	/**
	 * Update Role Permissions.
	 * @param $request \Illuminate\Http\Request
	 * @param $role \App\Models\Role
	 */
	public function manageRole(Request $request, $role)
	{
		// Developer is untouchable
		$permissions = $role->name === dev_role() ? Permission::all() : $request->get('permissions', []);

		$role->syncPermissions($permissions);
	}

	/**
	 * Update Admin Roles.
	 * 
	 * @param $request \Illuminate\Http\Request
	 * @param $admin \Nexus\Models\Admin
	 */
	public function manageAdmin(Request $request, $admin)
	{
		if (is_null($request->role)) return;
		
		// Get the submitted roles
		$roles = $request->get('role', []);
		$permissions = $request->get('permissions', []);

		// Get the roles
		$roles = Role::find($roles);

		// check for current role changes
		if( ! $admin->hasAllRoles( $roles ) ) {
			// reset all direct permissions for admin
			$admin->permissions()->sync([]);
		} else {
			// handle permissions
			$admin->syncPermissions($permissions);
		}

		$admin->syncRoles($roles);

		return $admin;
	}
}
