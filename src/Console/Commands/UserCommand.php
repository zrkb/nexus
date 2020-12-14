<?php

namespace Nexus\Console\Commands;

use Nexus\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nexus:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user admin';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $firstname = $this->ask('First Name', 'Felix');
        $lastname = $this->ask('Last Name', 'Ayala');
        $email = $this->ask('Email Address', 'felix1262@gmail.com');
        $password = $this->ask('Password', 'secret');

        $admin = config('nexus.models.admin')::create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $admin->assignRole(dev_role());

        $this->info('User Admin created successfully.');
    }
}
