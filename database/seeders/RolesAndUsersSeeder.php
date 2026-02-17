<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesAndUsersSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::firstOrCreate(['name' => 'SuperAdmin']);
        $coordinatorRole = Role::firstOrCreate(['name' => 'Coordinador']);

        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@localhost'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );
        $superAdmin->assignRole($superAdminRole);

        $coordinator = User::firstOrCreate(
            ['email' => 'coordinador@localhost'],
            [
                'name' => 'Coordinador Demo',
                'password' => Hash::make('password'),
            ]
        );
        $coordinator->assignRole($coordinatorRole);
    }
}
