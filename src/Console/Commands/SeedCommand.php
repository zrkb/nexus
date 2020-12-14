<?php

namespace Nexus\Console\Commands;

use Nexus\Models\Role;
use Nexus\Models\Permission;
use Illuminate\Console\Command;

class SeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nexus:seed {--refresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Nexus Data';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment(PHP_EOL . 'Nexus seed started' . PHP_EOL);

        $this->line('→ Running wizard ... <info>✔</info>');

        if ($this->option('refresh')) {
            $this->call('migrate:refresh');
            $this->warn("Data cleared, starting from blank database.");
        }

        // Seed the default permissions
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission],
                ['name' => $permission, 'guard_name' => 'admin']
            );
        }

        $this->info('Default Permissions added.');

        // Add roles
        foreach([dev_role(), 'Admin'] as $role) {
            $role = Role::firstOrCreate(
                ['name' => trim($role)],
                ['name' => trim($role), 'guard_name' => 'admin']
            );

            // Assign all permissions
            if ( $role->name == dev_role() ) {
                $role->syncPermissions(Permission::all());
                $this->info('Developer granted all the permissions');
            } else {
                // for others by default only read access
                $role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());
            }
        }

        $this->info('All roles has been added successfully');

        $this->info(PHP_EOL . 'Done.');
    }
}
