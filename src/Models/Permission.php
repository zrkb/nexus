<?php

namespace Pandorga\Laramie\Models;

use Pandorga\Laramie\Traits\HasPrevNext;
use Pandorga\Laramie\Traits\ResourceModel;

class Permission extends \Spatie\Permission\Models\Permission
{
	use ResourceModel, HasPrevNext;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'guard_name',
		'created_at',
		'updated_at',
	];

	public static function groupedByRoutes()
	{
		$permissions = static::all();

		$grouped = $permissions->groupBy(function ($item, $key) {
			list($action, $route) = explode('_', $item->name, 2);
			return $route;
		}, true);

		return $grouped;
	}

	public function getActionAttribute()
	{
		list($action) = explode('_', $this->name);

		return $action;
	}

	public function getRouteAttribute()
	{
		list(, $route) = explode('_', $this->name);

		return $route;
	}

	public static function defaultViews() : array
	{
		return [
			'admins',
			'roles',
			'permissions',
			'activities',
		];
	}

	public static function defaultActions() : array
	{
		return [
			'view'		=> "Ver",
			'add'		=> "Crear",
			'edit'		=> "Modificar",
			'delete'	=> "Eliminar",
		];
	}
	
	public static function defaultPermissions() : array
	{
		$permissions = array_map(function ($view) {
			$abilities = array_map(function ($action) use ($view) {
				return "{$action}_{$view}";
			}, array_keys(Permission::defaultActions()));

			return $abilities;
		}, static::defaultViews());
		
		$permissions = call_user_func_array('array_merge', $permissions);

		return $permissions;
	}
}
