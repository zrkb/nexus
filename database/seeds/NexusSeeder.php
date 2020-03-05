<?php

namespace Nexus\Database\Seeds;

use Illuminate\Database\Seeder;
use Nexus\Models\Permission;
use Nexus\Models\Role;

class NexusSeeder extends Seeder
{
	public function run()
	{
	}

	/**
	 * Create an admin with a given role
	 *
	 * @param $role
	 */
	private function createAdmin($role, $options = [])
	{
		$admin = factory(config('nexus.models.admin'))->create($options);

		$admin->assignRole($role->name);

		if( $role->name == dev_role() ) {
			$this->command->info('Here is your Developer details to login:');
			$this->command->warn($admin->email);
			$this->command->warn('Password is "secret"');
		}
	}
}
