<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call the UserRoleSeeder to seed roles and users
        $this->call(UserRoleSeeder::class);
    }
}
