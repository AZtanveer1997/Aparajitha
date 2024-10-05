<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles if they do not already exist
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }

        if (!Role::where('name', 'accountant')->exists()) {
            Role::create(['name' => 'accountant']);
        }

        // Create an Admin User
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'], // Check by email
            [
                'name' => 'Admin User',
                'password' => bcrypt('password123') // Use a secure password
            ]
        );
        $admin->assignRole('admin');

        // Create an Accountant User
        $accountant = User::updateOrCreate(
            ['email' => 'accountant@example.com'], // Check by email
            [
                'name' => 'Accountant User',
                'password' => bcrypt('password123') // Use a secure password
            ]
        );
        $accountant->assignRole('accountant');
    }
}
