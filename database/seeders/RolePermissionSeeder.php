<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::findOrCreate('admin');
        $operator = Role::findOrCreate('operator');

        $userAdmin = User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $userOperator = User::firstOrCreate([
            'name' => 'operator',
            'email' => 'operator@example.com',
            'password' => bcrypt('password'),
        ]);

        $userAdmin->assignRole($admin);
        $userOperator->assignRole($operator);

        $this->command->info('Role dan user telah dibuat.');
    }
}
