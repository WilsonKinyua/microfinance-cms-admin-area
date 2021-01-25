<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            BlogsTableSeeder::class,
            ServicesTableSeeder::class,
            AboutOurCompanyTableSeeder::class,
            TeamTableSeeder::class,
            HomePageSlidesTableSeeder::class
        ]);
    }
}
