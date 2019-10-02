<?php

namespace Pandorga\Nexus\Database\Seeds;

use Illuminate\Database\Seeder;
use Pandorga\Nexus\Models\Permission;
use Pandorga\Nexus\Models\Role;

class NexusSeeder extends Seeder
{
	public function run()
	{
		// Ask for db migration refresh, default is no
		if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
			// Call the php artisan migrate:refresh
			$this->command->call('migrate:refresh');
			$this->command->warn("Data cleared, starting from blank database.");
		}

		// Seed the default permissions
		$permissions = Permission::defaultPermissions();

		foreach ($permissions as $permission) {
			Permission::firstOrCreate(
				['name' => $permission],
				['name' => $permission, 'guard_name' => 'admin']
			);
		}

		$this->command->info('Default Permissions added.');

		// Confirm roles needed
		if ($this->command->confirm('Create Roles for Admin? Default is Developer and Admin [y|N]', true)) {

			// Ask for roles from input
			$inputRoles = $this->command->ask('Enter roles in comma separate format.', 'Developer, Admin');

			// Explode roles
			$rolesArray = explode(',', $inputRoles);

			// Add roles
			foreach($rolesArray as $role) {
				$role = Role::firstOrCreate(
					['name' => trim($role)],
					['name' => trim($role), 'guard_name' => 'admin']
				);

				if ( $role->name == dev_role() ) {
					// Assign all permissions
					$role->syncPermissions(Permission::all());
					$this->command->info('Developer granted all the permissions');

					// Create Developer Admin
					$this->createAdmin($role, [
						'firstname' => 'Lead',
						'lastname' => 'Developer',
						'email' => env('APP_DEVELOPER', 'developer@example.com')
					]);
				} else {
					// for others by default only read access
					$role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());

					// Create Admin
					$this->createAdmin($role);
				}
			}

			$this->command->info('Roles ' . $inputRoles . ' added successfully');

		} else {
			Role::firstOrCreate(
				['name' => 'Admin'],
				['name' => 'Admin', 'guard_name' => 'admin']
			);

			$this->command->info('Added only default admin role.');
		}

		$this->command->warn('All done :)' . PHP_EOL);
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
